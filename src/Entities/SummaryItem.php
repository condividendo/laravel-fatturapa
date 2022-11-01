<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\SummaryItem as SummaryItemTag;
use Condividendo\FatturaPA\Traits\Makeable;

class SummaryItem extends AbstractEntity
{
    use Makeable;

    /**
     * @return SummaryItemTag
     */
    public function getTag()
    {
        return SummaryItemTag::make();
    }
}
