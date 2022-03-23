<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:30:22
 *
 */
namespace Kovey\Etcd\Param\Common;

class Member extends Base
{
    public function ID() : string
    {
        return $this->get('ID');
    }

    public function clientURLs() : Array
    {
        return $this->get('clientURLs', array());
    }

    public function isLearner() : bool
    {
        return $this->get('isLearner', false);
    }

    public function name() : string
    {
        return $this->get('name');
    }

    public function peerURLs() : Array
    {
        return $this->get('peerURLs', array());
    }
}
