<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 13:08:55
 *
 */
namespace Kovey\Etcd\Param\Response\Lease;

use Kovey\Etcd\Param\Common\Base;

class Lease extends Base
{
    public function ID() : string
    {
        return $this->get('ID');
    }
}
