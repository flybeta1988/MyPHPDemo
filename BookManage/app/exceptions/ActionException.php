<?php
namespace App\Exceptions;

use Throwable;

class ActionException extends \Exception
{
    public function __construct($message = "", $code = 1, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}