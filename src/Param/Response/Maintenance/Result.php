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
namespace Kovey\Etcd\Param\Response\Maintenance;

use Kovey\Etcd\Param\Common\Base;

class Result extends Base
{
    public function blob() : string
    {
        return $this->get('blob');
    }

    public function remainingBytes() : string
    {
        return $this->get('remaining_bytes');
    }
}
