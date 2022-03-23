<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-22 16:21:18
 *
 */
namespace Kovey\Etcd\Param\Common;

class Header
{
    private Array $meta;

    public function __construct(Array $meta)
    {
        $this->meta = $meta;
    }

    public function get(string $field) : string
    {
        return $this->meta[$field] ?? '';
    }

    public function clusterId() : string
    {
        return $this->get('cluster_id');
    }

    public function memberId() : string
    {
        return $this->get('member_id');
    }

    public function raftTerm() : string
    {
        return $this->get('raft_term');
    }

    public function revision() : string
    {
        return $this->get('revision');
    }
}
