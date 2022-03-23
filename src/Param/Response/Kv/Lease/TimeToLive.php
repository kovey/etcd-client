<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 11:19:36
 *
 */
namespace Kovey\Etcd\Param\Response\Kv\Lease;

use Kovey\Etcd\Param\Common\Base;

class TimeToLive extends Base
{
    public function ID() : string
    {
        return $this->get('ID');
    }

    public function TTL() : string
    {
        return $this->get('TTL');
    }

    public function grantedTTL() : string
    {
        return $this->get('grantedTTL');
    }

    public function keys() : Array
    {
        return $this->get('keys', array());
    }
}
