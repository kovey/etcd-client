<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 22:01:42
 *
 */
namespace Kovey\Etcd\Api;

use Kovey\Etcd\Url\Watch as UW;
use Kovey\Etcd\Param\Request\Watch\Watch as RW;
use Kovey\Etcd\Param\Response\Watch\Watch as RWW;

class Watch extends Base
{
    public function watch(RW $watch) : RWW
    {
        $response = $this->etcd->call(UW::WATCH_WATCH, $watch);
        return new RWW($response->all());
    }
}
