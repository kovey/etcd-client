<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 11:17:10
 *
 */
namespace Kovey\Etcd\Param\Response\Kv;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Response\Kv\Txn\Response;

class Txn extends Base
{
    private Array $responses;

    protected function init() : void
    {
        $this->responses = array();
        foreach ($this->get('responses', array()) as $response) {
            $this->responses[] = new Response($response);
        }
    }

    public function succeeded() : bool
    {
        return $this->get('succeeded', false);
    }

    public function responses() : Array
    {
        return $this->responses;
    }
}
