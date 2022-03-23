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
namespace Kovey\Etcd\Param\Response\Auth\Role;

use Kovey\Etcd\Param\Common\Base;

class Roles extends Base
{
    public function roles() : Array
    {
        return $this->get('roles', array());
    }
}
