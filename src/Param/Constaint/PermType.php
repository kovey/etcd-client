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

enum PermType
{
    case READ;

    case WRITE;

    case READWRITE;
}
