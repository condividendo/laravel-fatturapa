<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\StreetNumber as StreetNumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class StreetNumber extends AbstractEntity
{
    use Makeable;

    /**
     * @return StreetNumberTag
     */
    public function getTag()
    {
        return StreetNumberTag::make();
    }
}
