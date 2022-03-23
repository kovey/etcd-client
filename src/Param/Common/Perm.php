<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 16:38:35
 *
 */
namespace Kovey\Etcd\Param\Common;

use Kovey\Etcd\Param\Constaint\PermType;

class Perm extends Base
{
    public function key() : string
    {
        return $this->baseDecode($this->get('key'));
    }

    public function permType() : PermType
    {
        return match($this->get('permType')) {
            PermType::READ->name => PermType::READ,
            PermType::WRITE->name => PermType::WRITE,
            PermType::READWRITE->name => PermType::READWRITE
        };
    }

    public function rangeEnd() : string
    {
        return $this->baseDecode($this->get('range_end'));
    }
}
