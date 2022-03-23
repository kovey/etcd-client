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
use Kovey\Etcd\Param\Request\Maintenance\Alarm;
use Kovey\Etcd\Param\Request\Maintenance\Downgrade;
use Kovey\Etcd\Param\Request\Maintenance\Hash;
use Kovey\Etcd\Param\Request\Maintenance\TransferLeaderShip;
use Kovey\Etcd\Param\Constaint\Alarm as CA;
use Kovey\Etcd\Param\Constaint\AlarmAction;

class MaintenanceTest extends TestCase
{
    private Maintenance $maintenance;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        Etcd::setUserInfo('root', 'root');

        $this->maintenance = new Maintenance();
    }

    public function testAlarm() : void
    {
        $alarm = new Alarm();
        $alarm->setAction(AlarmAction::GET)
            ->setAlarm(CA::NONE);

        $result = $this->maintenance->alarm($alarm);
        $this->assertEquals(0, count($result->alarms()));
    }

    public function testStatus() : void
    {
        $result = $this->maintenance->status();
        $this->assertTrue(!empty($result->dbSizeInUse()));
    }
}
