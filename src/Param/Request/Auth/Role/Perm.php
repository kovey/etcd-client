<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:13:24
 *
 */
namespace Kovey\Etcd\Param\Request\Auth\Role;

use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Constaint\PermType;

class Perm extends Base
{
    public function setKey(string $key) : self
    {
        $this->data['key'] = $this->baseEncode($key);
        return $this;
    }

    public function setPermType(PermType $type) : self
    {
        $this->data['permType'] = $type->name;
        return $this;
    }

    public function setRangeEnd(string $rangeEnd) : self
    {
        $this->data['range_end'] = $this->baseEncode($rangeEnd);
        return $this;
    }
}
