<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\RecipientPec as RecipientPecTag;
use Condividendo\FatturaPA\Traits\Makeable;

class RecipientPec extends AbstractEntity
{
    use Makeable;

    /**
     * @return RecipientPecTag
     */
    public function getTag()
    {
        return RecipientPecTag::make();
    }
}
