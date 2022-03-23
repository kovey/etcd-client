<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 19:06:40
 *
 */
namespace Kovey\Etcd\Api\Cluster;

use Kovey\Etcd\Api\Base;
use Kovey\Etcd\Url\Cluster\Member as CM;
use Kovey\Etcd\Param\Request\Cluster\Member\Add;
use Kovey\Etcd\Param\Request\Cluster\Member\MList;
use Kovey\Etcd\Param\Request\Cluster\Member\Promote;
use Kovey\Etcd\Param\Request\Cluster\Member\Remove;
use Kovey\Etcd\Param\Request\Cluster\Member\Update;
use Kovey\Etcd\Param\Response\Cluster\Member\MList as MML;
use Kovey\Etcd\Param\Response\Cluster\Member\Add as MA;

class Member extends Base
{
    public function add(Add $data) : MA
    {
        $response = $this->etcd->call(CM::MEMBER_ADD, $data);
        return new MA($response->all());
    }

    public function list(MList $data) : MML
    {
        $response = $this->etcd->call(CM::MEMBER_LIST, $data);
        return new MML($response->all());
    }

    public function promote(Promote $promote) : MML
    {
        $response = $this->etcd->call(CM::MEMBER_PROMOTE, $promote);
        return new MML($response->all());
    }

    public function remove(Remove $remove) : MML
    {
        $response = $this->etcd->call(CM::MEMBER_REMOVE, $remove);
        return new MML($response->all());
    }

    public function update(Update $update) : MML
    {
        $response = $this->etcd->call(CM::MEMBER_UPDATE, $update);
        return new MML($response->all());
    }
}
