<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmissionFormat as TransmissionFormatTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmissionFormat extends AbstractEntity
{
    use Makeable;

    /**
     * @return TransmissionFormatTag
     */
    public function getTag()
    {
        return TransmissionFormatTag::make();
    }
}
