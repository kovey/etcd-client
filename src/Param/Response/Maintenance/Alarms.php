<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 13:18:39
 *
 */
namespace Kovey\Etcd\Param\Response\Maintenance;

use Kovey\Etcd\Param\Common\Base;

class Alarms extends Base
{
    private Array $alarms;

    protected function init() : void
    {
        $this->alarms = array();
        foreach ($this->get('alarms', array()) as $alarm) {
            $this->alarms[] = new Alarms($alarm);
        }
    }

    public function alarms() : Array
    {
        return $this->alarms;
    }
}
