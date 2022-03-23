<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 18:01:21
 *
 */
namespace Kovey\Etcd\Param\Response\Lease;

use Kovey\Etcd\Param\Common\Base;

class Result extends Base
{
    public function ID() : string
    {
        return $this->get('ID');
    }

    public function TTL() : string
    {
        return $this->get('TTL');
    }
}
