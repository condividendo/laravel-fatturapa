<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\FiscalCode as FiscalCodeTag;
use Condividendo\FatturaPA\Traits\Makeable;

class FiscalCode extends AbstractEntity
{
    use Makeable;

    /**
     * @return FiscalCodeTag
     */
    public function getTag()
    {
        return FiscalCodeTag::make();
    }
}
