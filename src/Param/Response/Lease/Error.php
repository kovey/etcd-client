<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 18:01:21
 *
 */
namespace Kovey\Etcd\Param\Response\Lease;

use Kovey\Etcd\Param\Common\Base;
use Kovey\Etcd\Param\Common\Detail;

class Error extends Base
{
    private Array $details;

    protected function init() : void
    {
        $this->details = array();
        foreach ($this->get('details', array()) as $detail) {
            $this->details[] = new Detail($detail);
        }
    }

    public function details() : Array
    {
        return $this->details;
    }

    public function grpcCode() : int
    {
        return $this->get('grpc_code', 0);
    }

    public function httpCode() : int
    {
        return $this->get('http_code');
    }

    public function httpStatus() : string
    {
        return $this->get('http_status');
    }

    public function message() : string
    {
        return $this->get('message');
    }
}
