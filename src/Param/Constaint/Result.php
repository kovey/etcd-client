<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 10:22:53
 *
 */
namespace Kovey\Etcd\Param\Constaint;

enum Result
{
    case EQUAL;

    case GREATER;

    case LESS;

    case NOT_EQUAL;
}
