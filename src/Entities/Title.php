<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Title as TitleTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Title extends AbstractEntity
{
    use Makeable;

    /**
     * @return TitleTag
     */
    public function getTag()
    {
        return TitleTag::make();
    }
}
