<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\LastName as LastNameTag;
use Condividendo\FatturaPA\Traits\Makeable;

class LastName extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return LastNameTag::make();
    }
}
