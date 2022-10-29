<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\FirstName as FirstNameTag;
use Condividendo\FatturaPA\Traits\Makeable;

class FirstName extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return FirstNameTag::make();
    }
}
