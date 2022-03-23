<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:22:01
 *
 */
namespace Kovey\Etcd\Param\Response\Auth;

use Kovey\Etcd\Param\Common\Base;

class Status extends Base
{
    public function authRevision() : string
    {
        return $this->get('authRevision');
    }

    public function enabled() : bool
    {
        return $this->get('enabled', false);
    }
}
