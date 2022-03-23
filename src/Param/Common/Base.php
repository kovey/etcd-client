<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 16:27:07
 *
 */
namespace Kovey\Etcd\Param\Common;

abstract class Base
{
    protected Array $meta;

    protected Header $header;

    final public function __construct(Array $meta)
    {
        $this->meta = $meta;
        $this->header = new Header($this->meta['header'] ?? array());
        $this->init();
    }

    protected function init() : void
    {}

    public function get(string $field, mixed $default = '') : mixed
    {
        return $this->meta[$field] ?? $default;
    }

    public function baseDecode(string $value) : string
    {
        if (empty($value)) {
            return $value;
        }

        return base64_decode($value);
    }

    public function baseEncode(string $value) : string
    {
        if (empty($value)) {
            return $value;
        }

        return base64_encode($value);
    }
}
