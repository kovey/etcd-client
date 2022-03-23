<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 18:01:21
 *
 */
namespace Kovey\Etcd\Param\Response\Kv;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Common\Kv;

class Range extends Base
{
    private Array $kvs;

    public function init() : void
    {
        $this->kvs = array();
        foreach ($this->get('kvs', array()) as $kv) {
            $this->kvs[] = new Kv($kv);
        }
    }

    public function count() : string
    {
        return $this->get('count', 0);
    }

    public function more() : bool
    {
        return $this->get('more', false);
    }

    public function kvs() : Array
    {
        return $this->kvs;
    }
}
