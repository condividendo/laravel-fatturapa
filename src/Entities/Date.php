<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Date as DateTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Date extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return DateTag::make();
    }
}
