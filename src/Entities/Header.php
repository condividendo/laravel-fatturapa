<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\Header as HeaderTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Header extends Entity
{
    use Makeable;

    public function getTag(): HeaderTag
    {
        return HeaderTag::make();
    }
}
