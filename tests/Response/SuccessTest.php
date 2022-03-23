<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 22:24:31
 *
 */
namespace Kovey\Etcd\Param\Response;

use PHPUnit\Framework\TestCase;

class SuccessTest extends TestCase
{
    public function testSuccess() : void
    {
        $success = new Success(array(
            'header' => array(
                'cluster_id' => '123',
                'member_id' => '234',
                'raft_term' => '111',
                'revision' => '123'
            ),
            'dbSize' => '1000kb',
            'test' => array(1, 2, 3)
        ));

        $this->assertEquals('123', $success->header()->clusterId());
        $this->assertEquals('234', $success->header()->memberId());
        $this->assertEquals('111', $success->header()->raftTerm());
        $this->assertEquals('123', $success->header()->revision());
        $this->assertEquals('1000kb', $success->get('dbSize'));
        $this->assertEquals(array(1, 2, 3), $success->get('test'));
    }
}
