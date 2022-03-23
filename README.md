## Etcd Client V3 With PHP
## Description
### Library
### Usage:
    - composer require kovey/etcd
### Run All Test:
    - php /path/to/tests/test.php --bootstrap=/path/to/vendor/autoload.php /path/to/tests
### Examples
```php
    use Kovey\Etcd\Api\Kv;
    use Kovey\Etcd\Param\Request\Kv\Put;
    use Kovey\Etcd\Param\Request\Kv\Range;

    Etcd::setHost('127.0.0.1', 2379);
    $kv = new Kv();
    $put = new Put();
    $put->setKey('test')
        ->setValue('test');
    $kv->put($put);
    $range = new Range();
    $range->setKey('test');
    $result = $kv->range($range);
    var_dump($result->count());
    var_dump($result->more());
    var_dump($result->kvs()[0]->value());
    var_dump($result->kvs()[0]->key());
    var_dump($result->kvs()[0]->version());
    var_dump($result->kvs()[0]->createRevision());
```
