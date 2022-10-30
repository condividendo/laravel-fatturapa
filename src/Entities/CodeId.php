<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\CodeId as CodeIdTag;
use Condividendo\FatturaPA\Traits\Makeable;

class CodeId extends AbstractEntity
{
    use Makeable;

    /**
     * @return CodeIdTag
     */
    public function getTag()
    {
        return CodeIdTag::make();
    }
}
