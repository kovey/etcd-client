<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 11:19:36
 *
 */
namespace Kovey\Etcd\Param\Response\Kv\Txn;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Common\Kv;

class Put extends Base
{
    private Kv $prevKv;

    protected function init() : void
    {
        $this->prevKv = new Kv($this->get('prev_kv', array()));
    }

    public function deleted() : string
    {
        return $this->get('deleted');
    }

    public function prevKv() : Kv
    {
        return $this->prevKv;
    }
}
