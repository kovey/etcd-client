<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 16:54:24
 *
 */
namespace Kovey\Etcd\Param\Request\Auth\User;

use Kovey\Etcd\Param\Request\Base;

class Add extends Base
{
    public function setHashedPassword(string $hashedPassword) : self
    {
        $this->data['hashedPassword'] = $hashedPassword;
        return $this;
    }

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

    public function setOptions(bool $noPassowrd) : self
    {
        $this->data['options'] = array('no_password' => $noPassowrd);
        return $this;
    }
}
