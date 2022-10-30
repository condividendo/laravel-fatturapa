<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\FirstName as FirstNameTag;
use Condividendo\FatturaPA\Traits\Makeable;

class FirstName extends AbstractEntity
{
    use Makeable;

    /**
     * @return FirstNameTag
     */
    public function getTag()
    {
        return FirstNameTag::make();
    }
}
