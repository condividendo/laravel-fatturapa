<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmitterId as TransmitterIdTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmitterId extends AbstractEntity
{
    use Makeable;

    /**
     * @return TransmitterIdTag
     */
    public function getTag()
    {
        return TransmitterIdTag::make();
    }
}
