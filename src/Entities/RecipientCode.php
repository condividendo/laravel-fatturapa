<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\RecipientCode as RecipientCodeTag;
use Condividendo\FatturaPA\Traits\Makeable;

class RecipientCode extends AbstractEntity
{
    use Makeable;

    /**
     * @return RecipientCodeTag
     */
    public function getTag()
    {
        return RecipientCodeTag::make();
    }
}
