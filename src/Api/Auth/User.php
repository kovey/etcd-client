<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:57:38
 *
 */
namespace Kovey\Etcd\Api\Auth;

use Kovey\Etcd\Api\Base;
use Kovey\Etcd\Url\Auth\User as AU;
use Kovey\Etcd\Param\Request\Auth\User\Add;
use Kovey\Etcd\Param\Request\Auth\User\Delete;
use Kovey\Etcd\Param\Request\Auth\User\Get;
use Kovey\Etcd\Param\Request\Auth\User\Grant;
use Kovey\Etcd\Param\Request\Auth\User\Revoke;
use Kovey\Etcd\Param\Request\Auth\User\Changepw;
use Kovey\Etcd\Param\Response\Auth\User\Users;
use Kovey\Etcd\Param\Response\Auth\Role\Roles;

class User extends Base
{
    public function add(Add $data) : bool
    {
        $this->etcd->call(AU::USER_ADD, $data);
        return true;
    }

    public function changepw(Changepw $data) : bool
    {
        $this->etcd->call(AU::USER_CHANGE_PW, $data);
        return true;
    }

    public function delete(Delete $delete) : bool
    {
        $this->etcd->call(AU::USER_DELETE, $delete);
        return true;
    }

    public function get(Get $data) : Roles
    {
        $response = $this->etcd->call(AU::USER_GET, $data);
        return new Roles($response->all());
    }

    public function grant(Grant $grant) : bool
    {
        $this->etcd->call(AU::USER_GRANT, $grant);
        return true;
    }

    public function list() : Users
    {
        $response = $this->etcd->call(AU::USER_LIST);
        return new Users($response->all());
    }

    public function revoke(Revoke $revoke) : bool
    {
        $this->etcd->call(AU::USER_REVOKE, $revoke);
        return true;
    }
}
