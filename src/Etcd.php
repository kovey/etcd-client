<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:21:46
 *
 */
namespace Kovey\Etcd;

use Kovey\Etcd\Api\Auth;
use Kovey\Etcd\Param\Request\Auth\Authenticate;

class Etcd
{
    private static Array $config = array(
        'host' => 'localhost',
        'port' => 2379,
        'enableSsl' => false,
        'timeout' => 30,
        'password' => '',
        'username' => ''
    );

    private static string $token = '';

    private static bool $isAuth = false;

    public static function setHost(string $host, int $port, int $timeout = 30) : void
    {
        self::$config['host'] = $host;
        self::$config['port'] = $port;
        self::$config['timeout'] = $timeout;
    }

    public static function setUserInfo(string $username, string $password) : void
    {
        self::$config['username'] = $username;
        self::$config['password'] = $password;
    }

    public static function enableSsl() : void
    {
        self::$config['enableSsl'] = true;
    }

    public static function host() : string
    {
        return self::$config['host'];
    }

    public static function port() : int
    {
        return self::$config['port'];
    }

    public static function ssl() : bool
    {
        return self::$config['enableSsl'];
    }

    public static function timeout() : int
    {
        return self::$config['timeout'];
    }

    public static function username() : string
    {
        return self::$config['username'];
    }

    public static function password() : string
    {
        return self::$config['password'];
    }

    public static function token() : string
    {
        return self::$token;
    }

    public static function initToken() : void
    {
        $auth = new Auth();
        $authenticate = new Authenticate();
        $authenticate->setName(self::$config['username'])
                     ->setPassword(self::$config['password']);

        self::$token = $auth->authenticate($authenticate);
    }

    public static function openAuth() : void
    {
        self::$isAuth = true;
    }

    public static function auth() : bool
    {
        return self::$isAuth;
    }

    public static function closeAuth() : void
    {
        self::$isAuth = false;
    }
}
