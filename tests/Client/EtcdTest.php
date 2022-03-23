<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 10:15:08
 *
 */
namespace Kovey\Etcd\Client;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Url\Cluster\Member;
use Kovey\Etcd\Exception\EtcdException;
use Kovey\Etcd\Param\Common\Member as CM;
use Kovey\Etcd\Param\Request\Cluster\Member\MList;

class EtcdTest extends TestCase
{
    public function testClient() : void
    {
        $cli = new Etcd('127.0.0.1', 7001, false);
        $cli->setTimeout(30);
        $data = new MList();
        $data->setIsLearner(true);
        $response = $cli->call(Member::MEMBER_LIST, $data);
        $this->assertTrue(!empty($response->header()));
        $this->assertTrue(!empty($response->get('members')));
    }

    public function testClientFailure() : void
    {
        $cli = new Etcd('127.0.0.1', 10000, false);
        $cli->setTimeout(30);
        $data = new MList();
        $data->setIsLearner(true);
        $this->expectException(EtcdException::class);
        $cli->call(Member::MEMBER_LIST, $data);
    }
}
