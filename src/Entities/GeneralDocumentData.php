<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\GeneralDocumentData as GeneralDocumentDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class GeneralDocumentData extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return GeneralDocumentDataTag::make();
    }
}
