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
namespace Kovey\Etcd\Param\Response\Watch;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Common\Kv;
use Kovey\Etcd\Param\Constaint\EventType;

class Event extends Base
{
    private Kv $kv;

    private Kv $prevKv;

    protected function init() : void
    {
        $this->kv = new Kv($this->get('kv', array()));
        $this->prevKv = new Kv($this->get('prev_kv', array()));
    }

    public function type() : EventType
    {
        return match($this->get('type')) {
            EventType::PUT->name => EventType::PUT,
            EventType::DELETE->name => EventType::DELETE
        };
    }

    public function kv() : Kv
    {
        return $this->kv;
    }

    public function prevKv() : Kv
    {
        return $this->prevKv;
    }
}
