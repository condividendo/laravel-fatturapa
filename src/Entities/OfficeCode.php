<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\OfficeCode as OfficeCodeTag;
use Condividendo\FatturaPA\Traits\Makeable;

class OfficeCode extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return OfficeCodeTag::make();
    }
}
