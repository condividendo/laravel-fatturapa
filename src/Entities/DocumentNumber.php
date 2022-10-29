<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\DocumentNumber as DocumentNumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class DocumentNumber extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return DocumentNumberTag::make();
    }
}
