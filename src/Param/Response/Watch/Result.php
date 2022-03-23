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

class Result extends Base
{
    private Array $events;

    protected function init() : void
    {
        $this->events = array();
        foreach ($this->get('events', array()) as $event) {
            $this->events[] = new Event($event);
        }
    }

    public function cancelReason() : string
    {
        return $this->get('cancel_reason');
    }

    public function canceled() : bool
    {
        return $this->get('canceled', false);
    }

    public function compactRevision() : string
    {
        return $this->get('compact_revision');
    }

    public function created() : bool
    {
        return $this->get('created', false);
    }

    public function fragment() : bool
    {
        return $this->get('fragment', false);
    }

    public function watchId() : string
    {
        return $this->get('watch_id');
    }

    public function events() : Array
    {
        return $this->events;
    }
}
