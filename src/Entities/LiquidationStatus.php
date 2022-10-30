<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\LiquidationStatus as LiquidationStatusTag;
use Condividendo\FatturaPA\Traits\Makeable;

class LiquidationStatus extends AbstractEntity
{
    use Makeable;

    /**
     * @return LiquidationStatusTag
     */
    public function getTag()
    {
        return LiquidationStatusTag::make();
    }
}
