<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\GoodServicesData as GoodServicesDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class GoodServicesData extends AbstractEntity
{
    use Makeable;

    /**
     * @return GoodServicesDataTag
     */
    public function getTag()
    {
        return GoodServicesDataTag::make();
    }
}
