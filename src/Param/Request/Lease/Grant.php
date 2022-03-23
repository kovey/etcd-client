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

namespace Kovey\Etcd\Param\Request\Lease;

use Kovey\Etcd\Param\Request\Base;

class Grant extends Base
{
    public function setID(string $ID) : self
    {
        $this->data['ID'] = $ID;
        return $this;
    }

    public function setTTL(string $TTL) : self
    {
        $this->data['TTL'] = $TTL;
        return $this;
    }
}
