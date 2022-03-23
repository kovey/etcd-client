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

class Downgrade extends Base
{
    public function version() : string
    {
        return $this->get('version');
    }
}
