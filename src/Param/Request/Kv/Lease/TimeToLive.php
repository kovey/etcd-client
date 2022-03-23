<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 12:19:02
 *
 */
namespace Kovey\Etcd\Param\Request\Kv\Lease;

use Kovey\Etcd\Param\Request\Base;

class TimeToLive extends Base
{
    public function setID(string $ID) : self
    {
        $this->data['ID'] = $ID;
        return $this;
    }

    public function setKeys(bool $keys) : self
    {
        $this->data['keys'] = $keys;
        return $this;
    }
}
