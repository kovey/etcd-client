<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 14:32:12
 *
 */
namespace Kovey\Etcd\Param\Response\Auth\Role;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Common\Perm;

class Perms extends Base
{
    private Array $perms;

    protected function init() : void
    {
        $this->perms = array();
        foreach ($this->get('perm', array()) as $perm) {
            $this->perms[] = new Perm($perm);
        }
    }

    public function perm() : Array
    {
        return $this->perms;
    }
}
