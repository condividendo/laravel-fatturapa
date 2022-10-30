<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Country as CountryTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Country extends AbstractEntity
{
    use Makeable;

    /**
     * @return CountryTag
     */
    public function getTag()
    {
        return CountryTag::make();
    }
}
