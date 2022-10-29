<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Header as HeaderTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Header extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return HeaderTag::make();
    }
}
