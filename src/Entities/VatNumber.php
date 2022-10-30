<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\VatNumber as VatNumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class VatNumber extends AbstractEntity
{
    use Makeable;

    /**
     * @return VatNumberTag
     */
    public function getTag()
    {
        return VatNumberTag::make();
    }
}
