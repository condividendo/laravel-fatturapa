<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Overview as OverviewTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Overview extends AbstractEntity
{
    use Makeable;

    /**
     * @return OverviewTag
     */
    public function getTag()
    {
        return OverviewTag::make();
    }
}
