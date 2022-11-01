<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Item as ItemTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Item extends AbstractEntity
{
    use Makeable;

    /**
     * @return ItemTag
     */
    public function getTag()
    {
        return ItemTag::make();
    }
}
