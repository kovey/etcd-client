<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:43:05
 *
 */
namespace Kovey\Etcd\Url\Auth;

class User
{
    const USER_ADD = '/v3/auth/user/add';

    const USER_CHANGE_PW = '/v3/auth/user/changepw';

    const USER_DELETE = '/v3/auth/user/delete';

    const USER_GET = '/v3/auth/user/get';

    const USER_GRANT = '/v3/auth/user/grant';

    const USER_LIST = '/v3/auth/user/list';

    const USER_REVOKE = '/v3/auth/user/revoke';
}
