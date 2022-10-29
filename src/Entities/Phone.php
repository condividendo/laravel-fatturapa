<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Phone as PhoneTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Phone extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return PhoneTag::make();
    }
}
