<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\VatNumber as VatNumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class VatNumber extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return VatNumberTag::make();
    }
}
