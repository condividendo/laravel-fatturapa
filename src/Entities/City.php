<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\City as CityTag;
use Condividendo\FatturaPA\Traits\Makeable;

class City extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return CityTag::make();
    }
}
