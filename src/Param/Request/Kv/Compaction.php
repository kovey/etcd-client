<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:42:50
 *
 */
namespace Kovey\Etcd\Param\Request\Kv;

use Kovey\Etcd\Param\Request\Base;

class Compaction extends Base
{
    public function setPhysical(bool $physical) : self
    {
        $this->data['physical'] = $physical;
        return $this;
    }

    public function setRevision(string $revision) : self
    {
        $this->data['revision'] = $revision;
        return $this;
    }
}
