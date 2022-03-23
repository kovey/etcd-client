<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-21 11:08:48
 *
 */
namespace Kovey\Etcd\Api;

use PHPUnit\Framework\TestCase;
use Kovey\Etcd\Etcd;
use Kovey\Etcd\Api\Auth\User;
use Kovey\Etcd\Param\Request\Auth\User\Add;
use Kovey\Etcd\Param\Request\Auth\User\Delete;
use Kovey\Etcd\Param\Request\Auth\User\Grant;
use Kovey\Etcd\Param\Request\Auth\Authenticate;
use Kovey\Etcd\Param\Response\Auth\Status;

class AuthTest extends TestCase
{
    private Auth $auth;

    private User $user;

    private Add $add;

    private Delete $delete;

    public function setUp() : void
    {
        Etcd::setHost('127.0.0.1', 7001);
        Etcd::setUserInfo('root', 'root');

        $this->add = new Add();
        $this->add
             ->setName('root')
             ->setPassword('root')
             ->setOptions(false);

        $this->delete = new Delete();
        $this->delete->setName('root');

        $this->auth = new Auth();
        try {
            $this->auth->enable();
        } catch (\Throwable $e) {
            try {
                $this->user = new User();
                $this->user->add($this->add);
                $grant = new Grant();
                $grant->setUser('root')
                      ->setRole('root');

                $this->user->grant($grant);
            } catch (\Throwable $e) {
            } 

            try {
                $this->auth->enable();
            } catch (\Throwable $e) {
            }
        }

        Etcd::openAuth();
        Etcd::initToken();
        $this->auth = new Auth();
        $this->user = new User();

        try {
            $this->user->add($this->add);
            $grant = new Grant();
            $grant->setUser('root')
                  ->setRole('root');

            $this->user->grant($grant);
        } catch (\Throwable $e) {
        }
    }

    public function testEnable() : void
    {
        $this->assertTrue($this->auth->enable());
        $status = $this->auth->status();
        $this->assertTrue(!empty($status->authRevision()));
        $this->assertTrue($status->enabled());
    }

    public function testStatus() : void
    {
        $status = $this->auth->status();
        $this->assertTrue($status->enabled());
        $this->assertTrue(!empty($status->authRevision()));
    }

    public function testAuthenticate() : void
    {
        $authenticate = new Authenticate();
        $authenticate->setName('root')
                     ->setPassword('root');

        $token = $this->auth->authenticate($authenticate);
        $this->assertTrue(!empty($token));
    }

    public function testDisable() : void
    {
        $this->assertTrue($this->auth->disable());
        Etcd::closeAuth();
        $auth = new Auth();
        $status = $auth->status();
        $this->assertFalse($status->enabled());
    }
    

    public function tearDown() : void
    {
        try {
            $this->user->delete($this->delete);
        } catch (\Throwable $e) {
        }
    }
}
