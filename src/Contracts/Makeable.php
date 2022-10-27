<?php

namespace Condividendo\FatturaPA\Contracts;

interface Makeable
{
    /**
     * @param ...$arguments
     * @return self
     */
    static function make(...$arguments);
}
