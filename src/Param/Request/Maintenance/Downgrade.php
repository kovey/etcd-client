<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:50:05
 *
 */

namespace Kovey\Etcd\Param\Request\Maintenance;

use Kovey\Etcd\Param\Request\Base;
use Kovey\Etcd\Param\Constaint\DowngradeAction;

class Downgrade extends Base
{
    public function setAction(DowngradeAction $action) : self
    {
        $this->data['action'] = $action->name;
        return $this;
    }

    public function setVersion(string $version) : self
    {
        $this->data['version'] = $version;
        return $this;
    }
}
