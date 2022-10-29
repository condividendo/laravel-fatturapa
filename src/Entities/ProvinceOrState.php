<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\ProvinceOrState as ProvinceOrStateTag;
use Condividendo\FatturaPA\Traits\Makeable;

class ProvinceOrState extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return ProvinceOrStateTag::make();
    }
}
