<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:33:21
 *
 */
namespace Kovey\Etcd\Param\Response\Cluster\Member;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Common\Member;

class MList extends Base
{
    private Array $members;

    protected function init() : void
    {
        $this->members = array();
        foreach ($this->get('members', array()) as $member) {
            $this->members[] = new Member($member);
        }
    }

    public function members() : Array
    {
        return $this->members;
    }
}
