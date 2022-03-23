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

class Hash extends Base
{
    public function setRevision(string $revision) : self
    {
        $this->data['revision'] = $revision;
        return $this;
    }
}
