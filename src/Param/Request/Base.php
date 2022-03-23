<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 16:45:23
 *
 */
namespace Kovey\Etcd\Param\Request;

abstract class Base
{
    protected Array $data;

    final public function __construct()
    {
        $this->data = array();
        $this->init();
    }

    protected function init() : void
    {
    }

    public function baseEncode(string $value) : string
    {
        if (empty($value)) {
            return $value;
        }

        return base64_encode($value);
    }

    public function toJson() : string
    {
        if (empty($this->data)) {
            return '{}';
        }

        return json_encode($this->data);
    }

    public function toArray() : Array
    {
        return $this->data;
    }
}
