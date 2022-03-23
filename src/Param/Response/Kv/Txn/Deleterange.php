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

class Deleterange extends Base
{
    private Array $prevKvs;

    protected function init() : void
    {
        $this->prevKvs = array();
        foreach ($this->get('prev_kvs', array()) as $kv) {
            $this->prevKvs[] = new Kv($kv);
        }
    }

    public function deleted() : string
    {
        return $this->get('deleted');
    }

    public function prevKvs() : Array
    {
        return $this->prevKvs;
    }
}
