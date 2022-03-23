<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:31:47
 *
 */
namespace Kovey\Etcd\Url;

class Maintenance
{
    const MAINTENANCE_ALARM = '/v3/maintenance/alarm';

    const MAINTENANCE_DEFRAGMENT = '/v3/maintenance/defragment';

    const MAINTENANCE_DOWNGRADE = '/v3/maintenance/downgrade';

    const MAINTENANCE_HASH = '/v3/maintenance/hash';

    const MAINTENANCE_SNAPSHOT = '/v3/maintenance/snapshot';

    const MAINTENANCE_STATUS = '/v3/maintenance/status';

    const MAINTENANCE_TRANSFER_LEASER_SHIP = '/v3/maintenance/transfer-leadership';
}
