<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 21:35:17
 *
 */
namespace Kovey\Etcd\Api\Kv;

use Kovey\Etcd\Api\Base;
use Kovey\Etcd\Url\Kv\Lease as LL;
use Kovey\Etcd\Param\Request\Kv\Lease\Revoke;
use Kovey\Etcd\Param\Request\Kv\Lease\TimeToLive;
use Kovey\Etcd\Param\Response\Lease\Leases;
use Kovey\Etcd\Param\Response\Kv\Lease\TimeToLive as TTL;

class Lease extends Base
{
    public function leases() : Leases
    {
        $response = $this->etcd->call(LL::LEASE_LEASES);
        return new Leases($response->all());
    }

    public function revoke(Revoke $revoke) : bool
    {
        $this->etcd->call(LL::LEASE_REVOKE, $revoke);
        return true;
    }

    public function timetolive(TimeToLive $timetolive) : TTL
    {
        $response = $this->etcd->call(LL::LEASE_TIMETOLIVE, $timetolive);
        return new TTL($response->all());
    }
}
