<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 15:51:38
 *
 */
namespace Kovey\Etcd\Api\Auth;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Etcd;
use Kovey\Etcd\Param\Request\Auth\Role\Add;
use Kovey\Etcd\Param\Request\Auth\Role\Delete;
use Kovey\Etcd\Param\Request\Auth\Role\Get;
use Kovey\Etcd\Param\Request\Auth\Role\Grant;
use Kovey\Etcd\Param\Request\Auth\Role\Perm;
use Kovey\Etcd\Param\Constaint\PermType;
use Kovey\Etcd\Param\Request\Auth\Role\Revoke;

class RoleTest extends TestCase
{
    private Role $role;

    private Add $add;

    private Delete $delete;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        $this->role = new Role();
        $this->add = new Add();
        $this->add->setName('kovey');
        $this->delete = new Delete();
        $this->delete->setRole('kovey');
        try {
            $this->role->delete($this->delete);
        } catch (\Throwable $e) {
        }
    }

    public function testAdd() : void
    {
        $this->assertTrue($this->role->add($this->add));
        $this->role->delete($this->delete);
    }

    public function testDelete() : void
    {
        $this->role->add($this->add);
        $this->assertTrue($this->role->delete($this->delete));
    }

    public function testGrant() : void
    {
        $this->role->add($this->add);
        $perm = new Perm();
        $perm->setKey('/test')
             ->setPermType(PermType::WRITE)
             ->setRangeEnd('/test/*');

        $grant = new Grant();
        $grant->setName('kovey')
              ->setPerm($perm);

        $this->assertTrue($this->role->grant($grant));
        $this->role->delete($this->delete);
    }

    public function testRevoke() : void
    {
        $this->role->add($this->add);
        $perm = new Perm();
        $perm->setKey('/test')
             ->setPermType(PermType::WRITE)
             ->setRangeEnd('/test/*');

        $grant = new Grant();
        $grant->setName('kovey')
              ->setPerm($perm);
        $this->role->grant($grant);

        $revoke = new Revoke();
        $revoke->setKey('/test')
               ->setRangeEnd('/test/*')
               ->setRole('kovey');

        $this->assertTrue($this->role->revoke($revoke));
        $this->role->delete($this->delete);
    }

    public function testGet() : void
    {
        $this->role->add($this->add);
        $perm = new Perm();
        $perm->setKey('/test')
             ->setPermType(PermType::WRITE)
             ->setRangeEnd('/test/*');

        $grant = new Grant();
        $grant->setName('kovey')
              ->setPerm($perm);
        $this->role->grant($grant);
        $get = new Get();
        $get->setRole('kovey');
        $result = $this->role->get($get);
        $this->assertEquals(1, count($result->perm()));
        $role = $result->perm()[0];
        $this->assertEquals(PermType::WRITE, $role->permType());
        $this->assertEquals('/test', $role->key());
        $this->assertEquals('/test/*', $role->rangeEnd());
        $this->role->delete($this->delete);
    }
}

