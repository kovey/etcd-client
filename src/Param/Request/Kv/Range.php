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
use Kovey\Etcd\Param\Constaint\SortTarget;
use Kovey\Etcd\Param\Constaint\SortOrder;

class Range extends Base
{
    public function setCountOnly(bool $countOnly) : self
    {
        $this->data['count_only'] = $countOnly;
        return $this;
    }

    public function setLimit(string $limit) : self
    {
        $this->data['limit'] = $limit;
        return $this;
    }

    public function setKey(string $key) : self
    {
        $this->data['key'] = $this->baseEncode($key);
        return $this;
    }

    public function setMaxCreateRevision(string $maxCreateRevision) : self
    {
        $this->data['max_create_revision'] = $maxCreateRevision;
        return $this;
    }

    public function setMaxModRevision(string $maxModRevision) : self
    {
        $this->data['max_mod_revision'] = $maxModRevision;
        return $this;
    }

    public function setMinCreateRevision(string $minCreateRevision) : self
    {
        $this->data['min_create_revision'] = $minCreateRevision;
        return $this;
    }

    public function setMinModRevision(string $minModRevision) : self
    {
        $this->data['min_mod_revision'] = $minModRevision;
        return $this;
    }

    public function setValue(string $value) : self
    {
        $this->data['value'] = $this->baseEncode($value);
        return $this;
    }

    public function setRangeEnd(string $rangeEnd) : self
    {
        $this->data['range_end'] = $this->baseEncode($rangeEnd);
        return $this;
    }

    public function setRevision(string $revision) : self
    {
        $this->data['revision'] = $revision;
        return $this;
    }

    public function setSerializable(bool $serializable) : self
    {
        $this->data['serializable'] = $serializable;
        return $this;
    }

    public function setSortOrder(SortOrder $sortOrder) : self
    {
        $this->data['sort_order'] = $sortOrder->name;
        return $this;
    }

    public function setSortTarget(SortTarget $sortTarget) : self
    {
        $this->data['sort_target'] = $sortTarget->name;
        return $this;
    }
}
