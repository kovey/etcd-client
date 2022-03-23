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

namespace Kovey\Etcd\Param\Request\Kv;

use Kovey\Etcd\Param\Request\Base;

class Put extends Base
{
    public function setIgnoreLease(bool $ignoreLease) : self
    {
        $this->data['ignore_lease'] = $ignoreLease;
        return $this;
    }

    public function setIgnoreValue(bool $ignoreValue) : self
    {
        $this->data['ignore_value'] = $ignoreValue;
        return $this;
    }

    public function setKey(string $key) : self
    {
        $this->data['key'] = $this->baseEncode($key);
        return $this;
    }

    public function setLease(string $lease) : self
    {
        $this->data['lease'] = $lease;
        return $this;
    }

    public function setPrevKv(bool $prevKv) : self
    {
        $this->data['prev_kv'] = $prevKv;
        return $this;
    }

    public function setValue(string $value) : self
    {
        $this->data['value'] = $this->baseEncode($value);
        return $this;
    }
}
