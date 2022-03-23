<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:58:30
 *
 */
namespace Kovey\Etcd\Version;

class Version
{
    const VERSTION_NUMBER = 10000;

    const VERSTION_NAME = '1.0.0';

    const APP_NAME = 'Etcd Client With PHP';

    public static function name() : string
    {
        return self::APP_NAME . '/' . self::VERSTION_NAME;
    }
}
