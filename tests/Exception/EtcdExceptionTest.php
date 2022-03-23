<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 22:29:23
 *
 */
namespace Kovey\Etcd\Exception;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Param\Response\Error;

class EtcdExceptionTest extends TestCase
{
    public function testException() : void
    {
        $error = new Error(array(
            'code' => 100,
            'details' => array(
                array(
                    'type_url' => 'test',
                    'value' => 'kovey'
                )
            ),
            'error' => 'error',
            'message' => 'error message'
        ));
        $ex = new EtcdException($error);
        $this->assertEquals(100, $ex->getCode());
        $this->assertEquals('error message', $ex->getMessage());
        $this->assertEquals(100, $ex->getError()->code());
        $details = $ex->getError()->details();
        $this->assertEquals(1, count($details));
        $this->assertEquals('test', $details[0]->typeUrl());
        $this->assertEquals('kovey', $details[0]->value());
        $this->assertEquals('error', $ex->getError()->error());
        $this->assertEquals('error message', $ex->getError()->message());
        $this->expectException(EtcdException::class);
        throw $ex;
    }
}
