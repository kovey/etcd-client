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

class Add extends Base
{
    public function setName(string $name) : self
    {
        $this->data['name'] = $name;
        return $this;
    }
}
