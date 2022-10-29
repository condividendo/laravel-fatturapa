<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Type as TypeTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Type extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return TypeTag::make();
    }
}
