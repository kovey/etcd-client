<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 11:08:48
 *
 */
namespace Kovey\Etcd\Api;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Etcd;
use Kovey\Etcd\Param\Request\Lease\Grant;
use Kovey\Etcd\Param\Request\Lease\KeepAlive;
use Kovey\Etcd\Param\Request\Kv\Lease\Revoke;
use Kovey\Etcd\Param\Request\Kv\Lease\TimeToLive;

class LeaseTest extends TestCase
{
    private Lease $lease;

    private Grant $grant;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        Etcd::setUserInfo('root', 'root');

        $this->lease = new Lease();
        $this->grant = new Grant();
        $this->grant
             ->setID('0')
             ->setTTL(30);
    }

    public function testGrant() : void
    {
        $result = $this->lease->grant($this->grant);
        $this->assertTrue(!empty($result->ID()));
        $this->assertEquals(30, $result->TTL());
        $this->assertEquals('', $result->error());
        $revoke = new Revoke();
        $revoke->setID($result->ID());
        $this->lease->revoke($revoke);
    }

    public function testKeepalive() : void
    {
        $result = $this->lease->grant($this->grant);
        $keepalive = new KeepAlive();
        $keepalive->setID($result->ID());
        $res = $this->lease->keepalive($keepalive);
        $this->assertEquals($result->ID(), $res->result()->ID());
        $this->assertEquals(30, $res->result()->TTL());
        $revoke = new Revoke();
        $revoke->setID($result->ID());
        $this->lease->revoke($revoke);
    }

    public function testLeases() : void
    {
        $result = $this->lease->grant($this->grant);
        $res = $this->lease->leases();
        $this->assertEquals(1, count($res->leases()));
        $this->assertEquals($result->ID(), $res->leases()[0]->ID());
        $revoke = new Revoke();
        $revoke->setID($result->ID());
        $this->lease->revoke($revoke);
    }

    public function testRevoke() : void
    {
        $result = $this->lease->grant($this->grant);
        $revoke = new Revoke();
        $revoke->setID($result->ID());
        $this->assertTrue($this->lease->revoke($revoke));
    }

    public function testTimetolive() : void
    {
        $result = $this->lease->grant($this->grant);
        $timetolive = new TimeToLive();
        $timetolive->setID($result->ID())
                   ->setKeys(true);
        $res = $this->lease->timetolive($timetolive);
        $this->assertEquals($result->ID(), $res->ID());
        $this->assertEquals(29, $res->TTL());
        $this->assertTrue(!empty($res->grantedTTL()));
        $this->assertTrue(empty($res->keys()));
        $revoke = new Revoke();
        $revoke->setID($result->ID());
        $this->lease->revoke($revoke);
    }
}
