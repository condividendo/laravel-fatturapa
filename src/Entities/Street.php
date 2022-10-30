<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Street as StreetTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Street extends AbstractEntity
{
    use Makeable;

    /**
     * @return StreetTag
     */
    public function getTag()
    {
        return StreetTag::make();
    }
}
