<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TaxableAmount as TaxableAmountTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TaxableAmount extends AbstractEntity
{
    use Makeable;

    /**
     * @return TaxableAmountTag
     */
    public function getTag()
    {
        return TaxableAmountTag::make();
    }
}
