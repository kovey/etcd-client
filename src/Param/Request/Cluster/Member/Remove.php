<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:39:53
 *
 */
namespace Kovey\Etcd\Param\Request\Cluster\Member;

use Kovey\Etcd\Param\Request\Base;

class Remove extends Base
{
    public function setID(string $ID) : self
    {
        $this->data['ID'] = $ID;
        return $this;
    }
}
