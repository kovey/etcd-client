<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 19:15:45
 *
 */
namespace Kovey\Etcd\Api;

use Kovey\Etcd\Url\Kv as UK;
use Kovey\Etcd\Param\Request\Kv\Compaction;
use Kovey\Etcd\Param\Request\Kv\Deleterange;
use Kovey\Etcd\Param\Request\Kv\Put;
use Kovey\Etcd\Param\Request\Kv\Range;
use Kovey\Etcd\Param\Request\Kv\Txn;
use Kovey\Etcd\Param\Response\Kv\Txn\Deleterange as ResDel;
use Kovey\Etcd\Param\Response\Kv\Txn\Put as ResPut;
use Kovey\Etcd\Param\Response\Kv\Range as ResRange;
use Kovey\Etcd\Param\Response\Kv\Txn as ResTxn;

class Kv extends Base
{
    public function compaction(Compaction $compaction) : bool
    {
        $this->etcd->call(UK::KV_COMPACTION, $compaction);
        return true;
    }

    public function deleterange(Deleterange $del) : ResDel
    {
        $response = $this->etcd->call(UK::KV_DELETE_RANGE, $del);
        return new ResDel($response->all());
    }

    public function put(Put $put) : ResPut
    {
        $response = $this->etcd->call(UK::KV_PUT, $put);
        return new ResPut($response->all());
    }

    public function range(Range $range) : ResRange
    {
        $response = $this->etcd->call(UK::KV_RANGE, $range);
        return new ResRange($response->all());
    }

    public function rangeByKey(string $key) : ResRange
    {
        $range = new Range();
        $range->setKey($key);

        return $this->range($range);
    }

    public function txn(Txn $txn) : ResTxn
    {
        $response = $this->etcd->call(UK::KV_TXN, $txn);
        return new ResTxn($response->all());
    }
}
