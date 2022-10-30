<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\DocumentAmount as DocumentAmountTag;
use Condividendo\FatturaPA\Traits\Makeable;

class DocumentAmount extends AbstractEntity
{
    use Makeable;

    /**
     * @return DocumentAmountTag
     */
    public function getTag()
    {
        return DocumentAmountTag::make();
    }
}
