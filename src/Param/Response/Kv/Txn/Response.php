<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 11:40:20
 *
 */
namespace Kovey\Etcd\Param\Response\Kv\Txn;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Response\Kv\Range;

class Response extends Base
{
    private Deleterange $deleterange;

    private Range $range;

    private Put $put;

    protected function init() : void
    {
        $this->deleterange = new Deleterange($this->get('response_delete_range', array()));
        $this->range = new Range($this->get('response_range', array()));
        $this->put = new Put($this->get('response_put', array()));
    }

    public function responseTxn() : string
    {
        return $this->get('response_txn');
    }

    public function responseDeleteRange() : Deleterange
    {
        return $this->deleterange;
    }

    public function responsePut() : Put
    {
        return $this->put;
    }

    public function responseRange() : Range
    {
        return $this->range;
    }
}
