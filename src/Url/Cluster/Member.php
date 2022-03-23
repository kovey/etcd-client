<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:44:26
 *
 */
namespace Kovey\Etcd\Url\Cluster;

class Member
{
    const MEMBER_ADD = '/v3/cluster/member/add';

    const MEMBER_LIST = '/v3/cluster/member/list';

    const MEMBER_PROMOTE = '/v3/cluster/member/promote';

    const MEMBER_REMOVE = '/v3/cluster/member/remove';

    const MEMBER_UPDATE = '/v3/cluster/member/update';
}
