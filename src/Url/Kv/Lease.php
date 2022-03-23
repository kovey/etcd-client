<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:27:09
 *
 */
namespace Kovey\Etcd\Url\Kv;

class Lease
{
    const LEASE_LEASES = '/v3/kv/lease/leases';

    const LEASE_REVOKE = '/v3/kv/lease/revoke';

    const LEASE_TIMETOLIVE = '/v3/kv/lease/timetolive';
}
