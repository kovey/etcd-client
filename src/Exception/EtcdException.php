<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2022-03-19 18:35:40
 *
 */
namespace Kovey\Etcd\Exception;

use Kovey\Etcd\Param\Response\Error;

class EtcdException extends \RuntimeException
{
    private Error $error;

    public function __construct(Error $error)
    {
        $this->error = $error;
        parent::__construct($error->message(), $error->code());
    }

    public function getError() : Error
    {
        return $this->error;
    }
}
