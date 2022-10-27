<?php

namespace Condividendo\FatturaPA\Traits;

trait Makeable
{
    /**
     * @param ...$arguments
     * @return self
     * @noinspection PhpMissingReturnTypeInspection
     * @noinspection PhpMethodParametersCountMismatchInspection
     */
    static function make(...$arguments)
    {
        return new static(...$arguments);
    }
}
