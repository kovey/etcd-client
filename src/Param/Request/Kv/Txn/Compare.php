<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 10:17:16
 *
 */
namespace Kovey\Etcd\Param\Request\Kv\Txn;

use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Constaint\Result;
use Kovey\Etcd\Param\Constaint\Target;

class Compare extends Base
{
    public function setCreateRevision(string $createRevision) : self
    {
        $this->data['create_revision'] = $createRevision;
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

    public function setModVersion(string $modVersion) : self
    {
        $this->data['mod_revision'] = $modVersion;
        return $this;
    }

    public function setRangeEnd(string $rangeEnd) : self
    {
        $this->data['range_end'] = $this->baseEncode($rangeEnd);
        return $this;
    }

    public function setResult(Result $result) : self
    {
        $this->data['result'] = $result->name;
        return $this;
    }

    public function setTarget(Target $target) : self
    {
        $this->data['target'] = $target->name;
        return $this;
    }

    public function setValue(string $value) : self
    {
        $this->data['value'] = $this->baseEncode($value);
        return $this;
    }

    public function setVersion(string $version) : self
    {
        $this->data['version'] = $version;
        return $this;
    }
}
