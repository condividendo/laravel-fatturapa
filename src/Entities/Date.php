<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Date as DateTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Date extends AbstractEntity
{
    use Makeable;

    /**
     * @return DateTag
     */
    public function getTag()
    {
        return DateTag::make();
    }
}
