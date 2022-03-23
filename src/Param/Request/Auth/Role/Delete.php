<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:10:03
 *
 */
namespace Kovey\Etcd\Param\Request\Auth\Role;

use Kovey\Etcd\Param\Request\Base;

class Delete extends Base
{
    public function setRole(string $role) : self
    {
        $this->data['role'] = $role;
        return $this;
    }
}
