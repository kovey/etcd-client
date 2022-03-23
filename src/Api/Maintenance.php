<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 21:50:21
 *
 */
namespace Kovey\Etcd\Api;

use Kovey\Etcd\Url\Maintenance as UM;
use Kovey\Etcd\Param\Request\Maintenance\Alarm;
use Kovey\Etcd\Param\Request\Maintenance\Downgrade;
use Kovey\Etcd\Param\Request\Maintenance\Hash;
use Kovey\Etcd\Param\Request\Maintenance\TransferLeaderShip;
use Kovey\Etcd\Param\Response\Maintenance\Alarms;
use Kovey\Etcd\Param\Response\Maintenance\Downgrade as DG;
use Kovey\Etcd\Param\Response\Maintenance\Hash as MH;
use Kovey\Etcd\Param\Response\Maintenance\Snapshot;
use Kovey\Etcd\Param\Response\Maintenance\Status;

class Maintenance extends Base
{
    public function alarm(Alarm $alarm) : Alarms
    {
        $response = $this->etcd->call(UM::MAINTENANCE_ALARM, $alarm);
        return new Alarms($response->all());
    }

    public function defragment() : bool
    {
        $this->etcd->call(UM::MAINTENANCE_DEFRAGMENT);
        return true;
    }

    public function downgrade(Downgrade $downgrade) : DG
    {
        $response = $this->etcd->call(UM::MAINTENANCE_DOWNGRADE, $downgrade);
        return new DG($response->all());
    }

    public function hash(Hash $hash) : MH
    {
        $response = $this->etcd->call(UM::MAINTENANCE_HASH, array('revision' => $revision));
        return new MH($response->all());
    }

    public function snapshot() : Snapshot
    {
        $response = $this->etcd->call(UM::MAINTENANCE_SNAPSHOT);
        return new Snapshot($response->all());
    }

    public function status() : Status
    {
        $response = $this->etcd->call(UM::MAINTENANCE_STATUS);
        return new Status($response->all());
    }

    public function transferLeaderShip(TransferLeaderShip $tls) : bool
    {
        $this->etcd->call(UM::MAINTENANCE_TRANSFER_LEASER_SHIP, $tls);
        return true;
    }
}
