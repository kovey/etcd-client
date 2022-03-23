<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:18:32
 *
 */
namespace Kovey\Etcd\Api;

use Kovey\Etcd\Client\Etcd;
use Kovey\Etcd\Etcd as EE;
use Kovey\Etcd\Response;

abstract class Base
{
    protected Etcd $etcd;

    public function __construct()
    {
        $this->etcd = new Etcd(EE::host(), EE::port(), EE::ssl());
        $this->etcd->setTimeout(EE::timeout());
        if (EE::auth()) {
            $this->setToken(EE::token());
        }
    }

    public function setToken(string $token) : self
    {
        $this->etcd->setHeader('Authorization', $token);
        return $this;
    }
}
