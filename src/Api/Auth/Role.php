<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:45:30
 *
 */
namespace Kovey\Etcd\Api\Auth;

use Kovey\Etcd\Api\Base;
use Kovey\Etcd\Url\Auth\Role as AR;
use Kovey\Etcd\Param\Request\Auth\Role\Add;
use Kovey\Etcd\Param\Request\Auth\Role\Delete;
use Kovey\Etcd\Param\Request\Auth\Role\Get;
use Kovey\Etcd\Param\Request\Auth\Role\Grant;
use Kovey\Etcd\Param\Request\Auth\Role\Revoke;
use Kovey\Etcd\Param\Response\Auth\Role\Perms;
use Kovey\Etcd\Param\Response\Auth\Role\Roles;

class Role extends Base
{
    public function add(Add $data) : bool
    {
        $this->etcd->call(AR::ROLE_ADD, $data);
        return true;
    }

    public function delete(Delete $data) : bool
    {
        $this->etcd->call(AR::ROLE_DEL, $data);
        return true;
    }

    public function get(Get $data) : Perms
    {
        $response = $this->etcd->call(AR::ROLE_GET, $data);
        return new Perms($response->all());
    }

    public function grant(Grant $grant) : bool
    {
        $this->etcd->call(AR::ROLE_GRANT, $grant);
        return true;
    }

    public function list() : Roles
    {
        $response = $this->etcd->call(AR::ROLE_LIST);
        return new Roles($response->all());
    }

    public function revoke(Revoke $revoke) : bool
    {
        $this->etcd->call(AR::ROLE_REVOKE, $revoke);
        return true;
    }
}
