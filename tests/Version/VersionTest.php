<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 22:17:28
 *
 */
namespace Kovey\Etcd\Version;

use PHPUnit\Framework\TestCase;

class VersionTest extends TestCase
{
    public function testVersion() : void
    {
        $this->assertEquals(10000, Version::VERSTION_NUMBER);
        $this->assertEquals('1.0.0', Version::VERSTION_NAME);
        $this->assertEquals('Etcd Client With PHP/1.0.0', Version::name());
    }
}
