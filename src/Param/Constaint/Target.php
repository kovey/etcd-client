<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 10:24:15
 *
 */
namespace Kovey\Etcd\Param\Constaint;

enum Target
{
    case VERSION;

    case CREATE;

    case MOD;

    case VALUE;

    case LEASE;
}
