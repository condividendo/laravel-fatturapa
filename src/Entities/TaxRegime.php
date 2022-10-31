<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TaxRegime as TaxRegimeTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TaxRegime extends AbstractEntity
{
    use Makeable;

    /**
     * @return TaxRegimeTag
     */
    public function getTag()
    {
        return TaxRegimeTag::make();
    }
}
