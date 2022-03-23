<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:50:05
 *
 */

namespace Kovey\Etcd\Param\Request\Maintenance;

use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Constaint\Alarm as CA;
use Kovey\Etcd\Param\Constaint\AlarmAction;

class Alarm extends Base
{
    public function setAction(AlarmAction $action) : self
    {
        $this->data['action'] = $action->name;
        return $this;
    }

    public function setAlarm(CA $alarm) : self
    {
        $this->data['alarm'] = $alarm->name;
        return $this;
    }

    public function setMemberID(string $memberID) : self
    {
        $this->data['memberID'] = $memberID;
        return $this;
    }
}
