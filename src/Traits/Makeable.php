<?php

namespace Condividendo\FatturaPA\Traits;

trait Makeable
{
    /**
     * @return self
     * @noinspection PhpMissingReturnTypeInspection
     */
    static function make()
    {
        return new static();
    }
}
