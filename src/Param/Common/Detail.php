<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 16:25:51
 *
 */
namespace Kovey\Etcd\Param\Common;

class Detail extends Base
{
    public function typeUrl() : string
    {
        return $this->get('type_url');
    }

    public function value() : string
    {
        return $this->get('value');
    }
}
