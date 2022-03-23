<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 10:41:53
 *
 */
namespace Kovey\Etcd\Param\Request\Kv\Txn;

use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Result\Kv\Deleterange;
use Kovey\Etcd\Param\Result\Kv\Put;
use Kovey\Etcd\Param\Result\Kv\Range;

class Success extends Base
{
    public function setRequestDeleteRange(Deleterange $range) : self
    {
        $this->data['request_delete_range'] = $range->toArray();
        return $this;
    }

    public function setRequestPut(Put $put) : self
    {
        $this->data['request_put'] = $put->toArray();
        return $this;
    }

    public function setRequestRange(Range $range) : self
    {
        $this->data['request_range'] = $range->toArray();
        return $this;
    }

    public function setRequestTxn(string $txn) : self
    {
        $this->data['request_txn'] = $txn;
        return $this;
    }
}
