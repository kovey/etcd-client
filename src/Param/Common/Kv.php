<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:47:23
 *
 */
namespace Kovey\Etcd\Param\Common;

class Kv extends Base
{
    public function createRevision() : string
    {
        return $this->get('create_revision');
    }

    public function key() : string
    {
        return $this->baseDecode($this->get('key'));
    }

    public function lease() : string
    {
        return $this->get('lease');
    }

    public function modRevision() : string
    {
        return $this->get('mod_revision');
    }

    public function value() : string
    {
        return $this->baseDecode($this->get('value'));
    }

    public function version() : string
    {
        return $this->get('version');
    }
}
