<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 17:09:12
 *
 */
namespace Kovey\Etcd\Api\Cluster;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Etcd;
use Kovey\Etcd\Param\Request\Cluster\Member\MList;
use Kovey\Etcd\Param\Common\Member as CM;

class MemeberTest extends TestCase
{
    private Member $member;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        $this->member = new Member();
    }

    public function testList() : void
    {
        $data = new MList();
        $data->setIsLearner(true);
        $members = $this->member->list($data);

        $this->assertEquals(3, count($members->members()));
        $this->assertInstanceOf(CM::class, $members->members()[0]);
    }
}
