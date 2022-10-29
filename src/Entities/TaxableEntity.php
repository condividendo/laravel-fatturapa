<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TaxableEntity as TaxableEntityTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TaxableEntity extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return TaxableEntityTag::make();
    }
}
