<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 16:48:25
 *
 */
namespace Kovey\Etcd\Param\Request\Auth\Role;

use Kovey\Etcd\Param\Request\Base;

class Revoke extends Base
{
    public function setKey(string $key) : self
    {
        $this->data['key'] = $this->baseEncode($key);
        return $this;
    }

    public function setRangeEnd(string $rangeEnd) : self
    {
        $this->data['range_end'] = $this->baseEncode($rangeEnd);
        return $this;
    }

    public function setRole(string $role) : self
    {
        $this->data['role'] = $role;
        return $this;
    }
}
