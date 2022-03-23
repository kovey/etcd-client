<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:36:43
 *
 */
namespace Kovey\Etcd\Url\Auth;

class Role
{
    const ROLE_ADD = '/v3/auth/role/add';

    const ROLE_DEL = '/v3/auth/role/delete';

    const ROLE_GET = '/v3/auth/role/get';

    const ROLE_GRANT = '/v3/auth/role/grant';

    const ROLE_LIST = '/v3/auth/role/list';

    const ROLE_REVOKE = '/v3/auth/role/revoke';
}
