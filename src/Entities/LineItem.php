<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\LineItem as LineItemTag;
use Condividendo\FatturaPA\Traits\Makeable;

class LineItem extends AbstractEntity
{
    use Makeable;

    /**
     * @return LineItemTag
     */
    public function getTag()
    {
        return LineItemTag::make();
    }
}
