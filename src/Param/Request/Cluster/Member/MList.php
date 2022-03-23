<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:27:56
 *
 */
namespace Kovey\Etcd\Param\Request\Cluster\Member;

use Kovey\Etcd\Param\Request\Base;

class MList extends Base
{
    public function setIsLearner(bool $isLearner) : self
    {
        $this->data['isLearner'] = $isLearner;
        return $this;
    }
}
