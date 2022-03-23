<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:04:20
 *
 */
namespace Kovey\Etcd\Param\Response;

use Kovey\Etcd\Param\Common\Detail;

class Error
{
    private Array $response;

    private Array $details;

    public function __construct(Array $response)
    {
        $this->response = $response;
        $this->details = array();
        foreach (($this->response['details'] ?? array()) as $detail) {
            $this->details[] = new Detail($detail);
        }
    }

    public function code() : int
    {
        return $this->response['code'] ?? 0;
    }

    public function details() : Array
    {
        return $this->details;
    }

    public function error() : string
    {
        return $this->response['error'] ?? '';
    }

    public function message() : string
    {
        return $this->response['message'] ?? '';
    }
}
