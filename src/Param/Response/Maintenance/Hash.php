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

class Hash extends Base
{
    public function compactRevision() : string
    {
        return $this->get('compact_revision');
    }

    public function hash() : int
    {
        return $this->get('hash', 0);
    }
}
