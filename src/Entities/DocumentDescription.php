<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\DocumentDescription as DocumentDescriptionTag;
use Condividendo\FatturaPA\Traits\Makeable;

class DocumentDescription extends AbstractEntity
{
    use Makeable;

    /**
     * @return DocumentDescriptionTag
     */
    public function getTag()
    {
        return DocumentDescriptionTag::make();
    }
}
