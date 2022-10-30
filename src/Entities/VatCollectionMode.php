<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\VatCollectionMode as VatCollectionModeTag;
use Condividendo\FatturaPA\Traits\Makeable;

class VatCollectionMode extends AbstractEntity
{
    use Makeable;

    /**
     * @return VatCollectionModeTag
     */
    public function getTag()
    {
        return VatCollectionModeTag::make();
    }
}
