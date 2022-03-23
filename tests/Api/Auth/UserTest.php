<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 13:32:44
 *
 */
namespace Kovey\Etcd\Api\Auth;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Etcd;
use Kovey\Etcd\Param\Request\Auth\User\Add;
use Kovey\Etcd\Param\Request\Auth\User\Delete;
use Kovey\Etcd\Param\Request\Auth\User\Get;
use Kovey\Etcd\Param\Request\Auth\User\Grant;
use Kovey\Etcd\Param\Request\Auth\User\Revoke;
use Kovey\Etcd\Param\Request\Auth\User\Changepw;

class UserTest extends TestCase
{
    private User $user;

    private Delete $deleteRoot;

    private Delete $deleteUser;

    private Add $addRoot;

    private Add $addUser;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        $this->user = new User();
        $this->addRoot = new Add();
        $this->addRoot
             ->setName('root')
             ->setPassword('root')
             ->setOptions(false);

        $this->addUser = new Add();
        $this->addUser
             ->setName('kovey')
             ->setPassword('kovey')
             ->setOptions(false);

        $this->deleteUser = new Delete();
        $this->deleteUser->setName('kovey');
        $this->deleteRoot = new Delete();
        $this->deleteRoot->setName('root');
        try {
            $this->user->delete($this->deleteUser);
        } catch (\Throwable $e) {
        }

        try {
            $this->user->delete($this->deleteRoot);
        } catch (\Throwable $e) {
        }
    }

    public function testAdd() : void
    {
        $this->assertTrue($this->user->add($this->addRoot));
        $this->assertTrue($this->user->add($this->addUser));
        $this->assertEquals(array('kovey', 'root'), $this->user->list()->users());
        $this->user->delete($this->deleteRoot);
        $this->user->delete($this->deleteUser);
    }

    public function testChangePw() : void
    {
        $this->user->add($this->addUser);
        $changepw = new Changepw();
        $changepw->setName('kovey')
                 ->setPassword('kovey123');

        $this->assertTrue($this->user->changepw($changepw));
        $this->user->delete($this->deleteUser);
    }

    public function testDelete() : void
    {
        $this->user->add($this->addUser);
        $this->assertTrue($this->user->delete($this->deleteUser));
    }

    public function testGrant() : void
    {
        $this->assertTrue($this->user->add($this->addRoot));
        $this->assertEquals(array('root'), $this->user->list()->users());
        $grant = new Grant();
        $grant->setUser('root')
              ->setRole('root');

        $this->assertTrue($this->user->grant($grant));
        $this->user->delete($this->deleteRoot);
    }

    public function testList() : void
    {
        $this->user->add($this->addUser);
        $this->assertEquals(array('kovey'), $this->user->list()->users());
        $this->user->delete($this->deleteUser);
    }

    public function testRevoke() : void
    {
        $this->user->add($this->addRoot);
        $grant = new Grant();
        $grant->setUser('root')
              ->setRole('root');
        $this->user->grant($grant);
        $revoke = new Revoke();
        $revoke->setName('root')
               ->setRole('root');

        $this->assertTrue($this->user->revoke($revoke));
        $this->user->delete($this->deleteRoot);
    }
}
