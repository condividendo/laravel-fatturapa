<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Overview as OverviewTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Overview extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return OverviewTag::make();
    }
}
