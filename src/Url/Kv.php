<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 17:25:01
 *
 */
namespace Kovey\Etcd\Url;

class Kv
{
    const KV_COMPACTION = '/v3/kv/compaction';

    const KV_DELETE_RANGE = '/v3/kv/deleterange';

    const KV_PUT = '/v3/kv/put';

    const KV_RANGE = '/v3/kv/range';

    const KV_TXN = '/v3/kv/txn';
}
