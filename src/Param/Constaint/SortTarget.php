<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 10:53:34
 *
 */
namespace Kovey\Etcd\Param\Constaint;

enum SortTarget
{
    case KEY;

    case VERSION;

    case CREATE;

    case MOD;

    case VALUE;
}
