<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\GoodsServicesData as GoodsServicesDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class GoodsServicesData extends AbstractEntity
{
    use Makeable;

    /**
     * @return GoodsServicesDataTag
     */
    public function getTag()
    {
        return GoodsServicesDataTag::make();
    }
}
