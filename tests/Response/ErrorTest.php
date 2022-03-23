<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 22:20:12
 *
 */
namespace Kovey\Etcd\Param\Response;

use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase
{
    public function testError() : void
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

        $this->assertEquals(100, $error->code());
        $details = $error->details();
        $this->assertEquals(1, count($details));
        $this->assertEquals('test', $details[0]->typeUrl());
        $this->assertEquals('kovey', $details[0]->value());
        $this->assertEquals('error', $error->error());
        $this->assertEquals('error message', $error->message());
    }
}
