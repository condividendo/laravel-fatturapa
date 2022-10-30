<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Currency as CurrencyTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Currency extends AbstractEntity
{
    use Makeable;

    /**
     * @return CurrencyTag
     */
    public function getTag()
    {
        return CurrencyTag::make();
    }
}
