<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:08:35
 *
 */
namespace Kovey\Etcd\Param\Request;

class EmptyData extends Base
{
    public function toJson() : string
    {
        return '{}';
    }
}
