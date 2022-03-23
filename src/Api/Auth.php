<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:17:36
 *
 */
namespace Kovey\Etcd\Api;

use Kovey\Etcd\Url\Auth as UA;
use Kovey\Etcd\Param\Request\Auth\Authenticate;
use Kovey\Etcd\Param\Response\Auth\Status;

class Auth extends Base
{
    public function authenticate(Authenticate $authenticate) : string
    {
        $response = $this->etcd->call(UA::AUTH_AUTHENTICATE, $authenticate);
        return $response->get('token');
    }

    public function disable() : bool
    {
        $this->etcd->call(UA::AUTH_DISABLE);
        return true;
    }

    public function enable() : bool
    {
        $this->etcd->call(UA::AUTH_ENABLE);
        return true;
    }

    public function status() : Status
    {
        $response = $this->etcd->call(UA::AUTH_STATUS);
        return new Status($response->all());
    }
}
