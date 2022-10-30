<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TaxableEntity as TaxableEntityTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TaxableEntity extends AbstractEntity
{
    use Makeable;

    /**
     * @return TaxableEntityTag
     */
    public function getTag()
    {
        return TaxableEntityTag::make();
    }
}
