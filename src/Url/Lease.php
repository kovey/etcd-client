<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:30:06
 *
 */
namespace Kovey\Etcd\Url;

class Lease
{
    const LEASE_GRANT = '/v3/lease/grant';

    const LEASE_KEEPLIVE = '/v3/lease/keepalive';

    const LEASE_LEASES = '/v3/lease/leases';

    const LEASE_REVOKE = '/v3/lease/revoke';

    const LEASE_TIMETOLIVE = '/v3/lease/timetolive';
}
