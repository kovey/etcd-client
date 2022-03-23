<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 21:43:09
 *
 */
namespace Kovey\Etcd\Api;

use Kovey\Etcd\Url\Lease as UL;
use Kovey\Etcd\Param\Request\Lease\Grant;
use Kovey\Etcd\Param\Request\Lease\KeepAlive;
use Kovey\Etcd\Param\Request\Kv\Lease\Revoke;
use Kovey\Etcd\Param\Request\Kv\Lease\TimeToLive;
use Kovey\Etcd\Param\Response\Lease\Grant as LG;
use Kovey\Etcd\Param\Response\Lease\KeepAlive as LKA;
use Kovey\Etcd\Param\Response\Lease\Leases;
use Kovey\Etcd\Param\Response\Kv\Lease\TimeToLive as TTL;

class Lease extends Base
{
    public function grant(Grant $grant) : LG
    {
        $response = $this->etcd->call(UL::LEASE_GRANT, $grant);
        return new LG($response->all());
    }

    public function keepalive(KeepAlive $keepalive) : LKA
    {
        $response = $this->etcd->call(UL::LEASE_KEEPLIVE, $keepalive);
        return new LKA($response->all());
    }

    public function leases() : Leases
    {
        $response = $this->etcd->call(UL::LEASE_LEASES);
        return new Leases($response->all());
    }

    public function revoke(Revoke $revoke) : bool
    {
        $this->etcd->call(UL::LEASE_REVOKE, $revoke);
        return true;
    }

    public function timetolive(TimeToLive $timetolive) : TTL
    {
        $response = $this->etcd->call(UL::LEASE_TIMETOLIVE, $timetolive);
        return new TTL($response->all());
    }
}
