<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 12:27:27
 *
 */
namespace Kovey\Etcd\Param\Request\Lease;

use Kovey\Etcd\Param\Request\Base;

class KeepAlive extends Base
{
    public function setID(string $ID) : self
    {
        $this->data['ID'] = $ID;
        return $this;
    }
}
