<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:24:28
 *
 */
namespace Kovey\Etcd\Param\Request\Auth\User;

use Kovey\Etcd\Param\Request\Base;

class Grant extends Base
{
    public function setUser(string $user) : self
    {
        $this->data['user'] = $user;
        return $this;
    }

    public function setRole(string $role) : self
    {
        $this->data['role'] = $role;
        return $this;
    }
}
