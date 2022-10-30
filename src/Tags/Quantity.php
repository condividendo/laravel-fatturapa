<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Quantity as QuantityTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Quantity extends AbstractEntity
{
    use Makeable;

    /**
     * @return QuantityTag
     */
    public function getTag()
    {
        return QuantityTag::make();
    }
}
