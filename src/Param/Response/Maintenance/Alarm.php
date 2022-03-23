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
use Kovey\Etcd\Param\Constaint\Alarm as CA;

class Alarm extends Base
{
    public function alarm() : CA
    {
        return match($this->get('alarm')) {
            CA::NOSPACE->name => CA::NOSPACE,
            CA::CORRUPT->name => CA::CORRUPT,
            default => CA::NONE
        };
    }

    public function memberID() : string
    {
        return $this->get('memberID');
    }
}
