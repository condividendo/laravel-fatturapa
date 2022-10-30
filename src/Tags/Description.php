<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Description as DescriptionTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Description extends AbstractEntity
{
    use Makeable;

    /**
     * @return DescriptionTag
     */
    public function getTag()
    {
        return DescriptionTag::make();
    }
}
