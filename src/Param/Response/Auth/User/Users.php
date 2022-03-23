<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 14:38:14
 *
 */
namespace Kovey\Etcd\Param\Response\Auth\User;

use Kovey\Etcd\Param\Common\Base;

class Users extends Base
{
    public function users() : Array
    {
        return $this->get('users', array());
    }
}
