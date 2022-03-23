<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:13:24
 *
 */
namespace Kovey\Etcd\Param\Request\Auth\Role;

use Kovey\Etcd\Param\Request\Base;

class Grant extends Base
{
    public function setName(string $role) : self
    {
        $this->data['name'] = $role;
        return $this;
    }

    public function setPerm(Perm $perm) : self
    {
        $this->data['perm'] = $perm->toArray();
        return $this;
    }
}
