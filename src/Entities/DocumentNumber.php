<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\DocumentNumber as DocumentNumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class DocumentNumber extends AbstractEntity
{
    use Makeable;

    /**
     * @return DocumentNumberTag
     */
    public function getTag()
    {
        return DocumentNumberTag::make();
    }
}
