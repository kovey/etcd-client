<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:44:55
 *
 */
namespace Kovey\Etcd\Param\Request\Kv;

use Kovey\Etcd\Param\Request\Base;

class Deleterange extends Base
{
    public function setKey(string $key) : self
    {
        $this->data['key'] = $this->baseEncode($key);
        return $this;
    }

    public function setPrevKey(bool $prevKv) : self
    {
        $this->data['prev_kv'] = $prevKv;
        return $this;
    }

    public function setRangeEnd(string $rangeEnd) : self
    {
        $this->data['range_end'] = $rangeEnd;
        return $this;
    }
}
