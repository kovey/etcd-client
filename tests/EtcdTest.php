<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 22:08:11
 *
 */
namespace Kovey\Etcd;

use PHPUnit\Framework\TestCase;

class EtcdTest extends TestCase
{
    public function testEtcd() : void
    {
        $this->assertTrue(!empty(Etcd::host()));
        $this->assertTrue(!empty(Etcd::port()));
        $this->assertFalse(Etcd::ssl());
        $this->assertEquals(30, Etcd::timeout());

        Etcd::setHost('127.0.0.1', 7001, 5);
        Etcd::enableSsl();

        $this->assertEquals('127.0.0.1', Etcd::host());
        $this->assertEquals(7001, Etcd::port());
        $this->assertTrue(Etcd::ssl());
        $this->assertEquals(5, Etcd::timeout());
    }
}
