<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Capital as CapitalTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Capital extends AbstractEntity
{
    use Makeable;

    /**
     * @return CapitalTag
     */
    public function getTag()
    {
        return CapitalTag::make();
    }
}
