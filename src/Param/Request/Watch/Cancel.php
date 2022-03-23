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

namespace Kovey\Etcd\Param\Request\Watch;

use Kovey\Etcd\Param\Request\Base;

class Cancel extends Base
{
    public function setWatchId(string $watchId) : self
    {
        $this->data['watch_id'] = $watchId;
        return $this;
    }
}
