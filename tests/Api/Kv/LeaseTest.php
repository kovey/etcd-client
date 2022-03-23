<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 17:14:40
 *
 */
namespace Kovey\Etcd\Api\Kv;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Etcd;

class LeaseTest extends TestCase
{
    private Lease $lease;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        $this->lease = new Lease();
    }

    public function testLeases() : void
    {
        $this->assertEquals(array(), $this->lease->leases()->leases());
    }
}
