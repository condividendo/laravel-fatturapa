<?php

namespace Condividendo\FatturaPA\Traits;

trait Makeable
{
    /**
     * @return self
     * @noinspection PhpMissingReturnTypeInspection
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ReturnTypeHint
     */
    public static function make()
    {
        return new static();
    }
}
