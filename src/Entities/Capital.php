<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Capital as CapitalTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Capital extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return CapitalTag::make();
    }
}
