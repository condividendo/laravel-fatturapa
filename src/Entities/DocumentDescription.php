<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\DocumentDescription as DocumentDescriptionTag;
use Condividendo\FatturaPA\Traits\Makeable;

class DocumentDescription extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return DocumentDescriptionTag::make();
    }
}
