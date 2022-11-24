<?php

namespace Condividendo\FatturaPA\Traits;

use Brick\Math\BigDecimal;

trait UsesDecimal
{
    /**
     * @param string|\Brick\Math\BigDecimal $value
     */
    protected static function makeDecimal($value): BigDecimal
    {
        /** @phpstan-ignore-next-line */
        return BigDecimal::of($value);
    }
}
