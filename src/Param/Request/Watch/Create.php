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

namespace Kovey\Etcd\Param\Request\Watch;

use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Constaint\Filters;

class Create extends Base
{
    protected function init() : void
    {
        $this->data['filters'] = array();
    }

    public function setFilters(Filters $filter) : self
    {
        $this->data['filters'][] = $filter->name;
        return $this;
    }

    public function setFragment(bool $fragment) : self
    {
        $this->data['fragment'] = $fragment;
        return $this;
    }

    public function setKey(string $key) : self
    {
        $this->data['key'] = $this->baseEncode($key);
        return $this;
    }

    public function setPrevKv(bool $prevKv) : self
    {
        $this->data['prev_kv'] = $prevKv;
        return $this;
    }

    public function setProgressNotify(bool $progressNotify) : self
    {
        $this->data['progress_notify'] = $progressNotify;
        return $this;
    }

    public function setRangeEnd(string $rangeEnd) : self
    {
        $this->data['range_end'] = $this->baseEncode($rangeEnd);
        return $this;
    }

    public function setStartRevision(string $startRevision) : self
    {
        $this->data['start_revision'] = $startRevision;
        return $this;
    }

    public function setWatchId(string $watchId) : self
    {
        $this->data['watch_id'] = $watchId;
        return $this;
    }
}
