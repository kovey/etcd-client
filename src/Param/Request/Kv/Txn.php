<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 10:57:13
 *
 */
namespace Kovey\Etcd\Param\Request\Kv;

use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Request\Kv\Txn\Compare;
use Kovey\Etcd\Param\Request\Kv\Txn\Failure;
use Kovey\Etcd\Param\Request\Kv\Txn\Success;

class Txn extends Base
{
    protected function init() : void
    {
        $this->data['compare'] = array();
        $this->data['failure'] = array();
        $this->data['success'] = array();
    }

    public function setCompare(Compare $compare) : self
    {
        $this->data['compare'][] = $compare->toArray();
        return $this;
    }

    public function setFailure(Failure $failure) : self
    {
        $this->data['failure'][] = $failure->toArray();
        return $this;
    }

    public function setSuccess(Success $success) : self
    {
        $this->data['success'][] = $success->toArray();
        return $this;
    }
}
