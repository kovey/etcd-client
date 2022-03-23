<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 17:50:05
 *
 */

namespace Kovey\Etcd\Param\Request\Watch;

use Kovey\Etcd\Param\Request\Base;

class Watch extends Base
{
    public function setCancelRequest(Cancel $cancelRequest) : self
    {
        $this->data['cancel_request'] = $cancel->toArray();
        return $this;
    }

    public function setCreateRequest(Create $createRequest) : self
    {
        $this->data['create_request'] = $createRequest->toArray();
        return $this;
    }

    public function setProgressRequest(string $progressRequest) : self
    {
        $this->data['progress_request'] = $progressRequest->toArray();
        return $this;
    }
}
