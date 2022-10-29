<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\GoodServicesData as GoodServicesDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class GoodServicesData extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return GoodServicesDataTag::make();
    }
}
