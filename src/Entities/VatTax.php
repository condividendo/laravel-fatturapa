<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\VatTax as VatTaxTag;
use Condividendo\FatturaPA\Traits\Makeable;

class VatTax extends AbstractEntity
{
    use Makeable;

    /**
     * @return VatTaxTag
     */
    public function getTag()
    {
        return VatTaxTag::make();
    }
}
