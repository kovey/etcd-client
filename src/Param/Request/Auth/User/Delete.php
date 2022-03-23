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

class Delete extends Base
{
    public function setName(string $name) : self
    {
        $this->data['name'] = $name;
        return $this;
    }
}
