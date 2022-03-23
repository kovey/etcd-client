<?php
/**
 * @description etcd client
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-18 17:52:09
 *
 */
namespace Kovey\Etcd\Client;

use Swoole\Coroutine\Http\Client;
use Kovey\Etcd\Version\Version;
use Kovey\Etcd\Param\Response\Error;
use Kovey\Etcd\Param\Response\Success;
use Kovey\Etcd\Exception\EtcdException;
use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Request\EmptyData;

class Etcd
{
    private Client $client;

    public function __construct(string $host, int $port, bool $enableSsl = false) 
    {
        $this->client = new Client($host, $port, $enableSsl);
        $this->client->setHeaders(array(
            'Host' => $host,
            'User-Agent' => Version::name(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',
            'Content-Type' => 'application/json'
        ));
    }

    public function setHeader(string $key, string $value) : self
    {
        $this->client->setHeaders(array($key => $value));
        return $this;
    }

    public function setTimeout(int $timeout = 30) : self
    {
        $this->client->set(array('timeout' => $timeout));
        return $this;
    }

    public function call(string $path, Base $data = new EmptyData()) : Success
    {
        $this->client->post($path, $data->toJson());
        $response = json_decode($this->client->body, true);
        if (!is_array($response)) {
            $response = array();
        }

        if ($this->client->statusCode != 200) {
            throw new EtcdException(new Error($response));
        }

        return new Success($response);
    }

    public function __destruct()
    {
        $this->client->close();
    }
}
