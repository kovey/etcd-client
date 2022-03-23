<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 13:09:39
 *
 */
namespace Kovey\Etcd\Param\Response\Lease;

use Kovey\Etcd\Param\Common\Base;

class Leases extends Base
{
    private Array $leases;

    protected function init() : void
    {
        $this->leases = array();
        foreach ($this->get('leases', array()) as $lease) {
            $this->leases[] = new Lease($lease);
        }
    }

    public function leases() : Array
    {
        return $this->leases;
    }
}
