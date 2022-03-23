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
namespace Kovey\Etcd\Param\Response\Maintenance;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Response\Lease\Error;

class Snapshot extends Base
{
    private Error $error;

    private Result $result;

    protected function init() : void
    {
        $this->error = new Error($this->get('error', array()));
        $this->result = new Result($this->get('result', array()));
    }

    public function error() : Error
    {
        return $this->error;
    }

    public function result() : Result
    {
        return $this->result;
    }
}
