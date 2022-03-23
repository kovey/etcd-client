<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 22:07:08
 *
 */
Swoole\Coroutine\Run(function () {
    try {
        global $argc, $argv;
        require __DIR__ . '/../vendor/bin/phpunit';
    } catch(\Swoole\ExitException $e) {
        echo "test\n";
    } catch (Exception $e) {
        if ($e->getMessage() === 'swoole exit') {
            return;
        }

        throw $e;
    }
});
