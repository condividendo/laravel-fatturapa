<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\CountryId as CountryIdTag;
use Condividendo\FatturaPA\Traits\Makeable;

class CountryId extends AbstractEntity
{
    use Makeable;

    /**
     * @return CountryIdTag
     */
    public function getTag()
    {
        return CountryIdTag::make();
    }
}
