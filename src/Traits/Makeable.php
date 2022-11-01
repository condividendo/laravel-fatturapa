<?php

namespace Condividendo\FatturaPA\Traits;

trait Makeable
{
    /**
     * @return self
     * @noinspection PhpMissingReturnTypeInspection
     */
    public static function make()
    {
        return new static();
    }
}
