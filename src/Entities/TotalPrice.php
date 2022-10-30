<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TotalPrice as TotalPriceTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TotalPrice extends AbstractEntity
{
    use Makeable;

    /**
     * @return TotalPriceTag
     */
    public function getTag()
    {
        return TotalPriceTag::make();
    }
}
