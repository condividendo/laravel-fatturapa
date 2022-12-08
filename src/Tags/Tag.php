<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Contracts\Tag as TagContract;
use ValueError;

abstract class Tag implements TagContract
{
    protected static function checkScale(BigDecimal $decimal, int $minScale = 2, int $maxScale = 2): void
    {
        $actual = $decimal->getScale();

        if ($actual < $minScale || $actual > $maxScale) {
            throw new ValueError("The scale (number of digits after the decimal point) must be between $minScale
            and $maxScale. Given $actual.");
        }
    }
}
