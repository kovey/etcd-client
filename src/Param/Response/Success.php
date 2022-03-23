<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:08:24
 *
 */
namespace Kovey\Etcd\Param\Response;

use Kovey\Etcd\Param\Common\Header;

class Success
{
    private Array $response;

    private Header $header;

    public function __construct(Array $response)
    {
        $this->response = $response;
        $this->header = new Header($response['header'] ?? array());
    }

    public function header() : Header
    {
        return $this->header;
    }

    public function get(string $name, mixed $default = '') : mixed
    {
        return $this->response[$name] ?? $default;
    }

    public function all() : Array
    {
        return $this->response;
    }
}
