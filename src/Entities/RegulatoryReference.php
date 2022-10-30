<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\RegulatoryReference as RegulatoryReferenceTag;
use Condividendo\FatturaPA\Traits\Makeable;

class RegulatoryReference extends AbstractEntity
{
    use Makeable;

    /**
     * @return RegulatoryReferenceTag
     */
    public function getTag()
    {
        return RegulatoryReferenceTag::make();
    }
}
