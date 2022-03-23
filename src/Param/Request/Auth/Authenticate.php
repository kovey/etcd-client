<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:06:06
 *
 */
namespace Kovey\Etcd\Param\Request\Auth;

use Kovey\Etcd\Param\Request\Base;

class Authenticate extends Base
{
    public function setName(string $name) : self
    {
        $this->data['name'] = $name;
        return $this;
    }

    public function setPassword(string $password) : self
    {
        $this->data['password'] = $password;
        return $this;
    }
}
