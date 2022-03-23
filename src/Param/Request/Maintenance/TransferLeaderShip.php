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

class TransferLeaderShip extends Base
{
    public function setTargetID(string $targetID) : self
    {
        $this->data['targetID'] = $targetID;
        return $this;
    }
}
