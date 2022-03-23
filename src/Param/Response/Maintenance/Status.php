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

class Status extends Base
{
    public function dbSize() : string
    {
        return $this->get('dbSize');
    }

    public function dbSizeInUse() : string
    {
        return $this->get('dbSizeInUse');
    }

    public function errors() : Array
    {
        return $this->get('errors', array());
    }

    public function isLearner() : bool
    {
        return $this->get('isLearner', false);
    }

    public function leader() : string
    {
        return $this->get('leader');
    }

    public function raftAppliedIndex() : string
    {
        return $this->get('raftAppliedIndex');
    }

    public function raftIndex() : string
    {
        return $this->get('raftIndex');
    }

    public function raftTerm() : string
    {
        return $this->get('raftTerm');
    }

    public function version() : string
    {
        return $this->get('version');
    }
}
