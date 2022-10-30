<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\UnitPrice as UnitPriceTag;
use Condividendo\FatturaPA\Traits\Makeable;

class UnitPrice extends AbstractEntity
{
    use Makeable;

    /**
     * @return UnitPriceTag
     */
    public function getTag()
    {
        return UnitPriceTag::make();
    }
}
