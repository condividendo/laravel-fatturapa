<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Nature as NatureTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Nature extends AbstractEntity
{
    use Makeable;

    /**
     * @return NatureTag
     */
    public function getTag()
    {
        return NatureTag::make();
    }
}
