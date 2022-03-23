<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 18:57:10
 *
 */
namespace Kovey\Etcd\Api;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Etcd;
use Kovey\Etcd\Param\Request\Kv\Compaction;
use Kovey\Etcd\Param\Request\Kv\Deleterange;
use Kovey\Etcd\Param\Request\Kv\Put;
use Kovey\Etcd\Param\Request\Kv\Range;
use Kovey\Etcd\Param\Request\Kv\Txn;

class KvTest extends TestCase
{
    private Kv $kv;

    private Put $put;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        $this->kv = new Kv();
        $this->put = new Put();
        $this->put
             ->setKey('kovey')
             ->setValue('test');

    }

    public function testPut() : void
    {
        $this->kv->put($this->put);
        $kvs = $this->kv->rangeByKey('kovey');
        $this->assertTrue(count($kvs->kvs()) > 0);
        $this->assertEquals(1, $kvs->count());
        $this->assertFalse($kvs->more());
        $this->assertEquals('test', $kvs->kvs()[0]->value());
    }

    public function testRange() : void
    {
        try {
            $delete = new Deleterange();
            $delete->setKey('kovey');
            $result = $this->kv->deleterange($delete);
        } catch (\Throwable $e) {
        }
        $this->kv->put($this->put);
        $range = new Range();
        $range->setKey('kovey');

        $result = $this->kv->range($range);
        $this->assertEquals(1, $result->count());
        $this->assertEquals(false, $result->more());
        $this->assertEquals(1, count($result->kvs()));
        $kvs = $result->kvs()[0];
        $this->assertEquals(1, $kvs->version());
        $this->assertEquals('test', $kvs->value());
        $this->assertEquals('kovey', $kvs->key());
    }

    public function testDelete() : void
    {
        try {
            $delete = new Deleterange();
            $delete->setKey('kovey');
            $result = $this->kv->deleterange($delete);
        } catch (\Throwable $e) {
        }
        $this->kv->put($this->put);
        $delete = new Deleterange();
        $delete->setKey('kovey');
        $result = $this->kv->deleterange($delete);
        $this->assertEquals(1, $result->deleted());
        $range = new Range();
        $range->setKey('kovey');

        $result = $this->kv->range($range);
        $this->assertEquals(0, $result->count());
        $this->assertEquals(false, $result->more());
        $this->assertEquals(0, count($result->kvs()));
    }
}
