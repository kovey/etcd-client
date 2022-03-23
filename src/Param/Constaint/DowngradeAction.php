<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-23 13:14:47
 *
 */
namespace Kovey\Etcd\Param\Constaint;

enum DowngradeAction
{
    case VALIDATE;

    case ENABLE;

    case CANCEL;
}
