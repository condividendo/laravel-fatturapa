<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmissionData as TransmissionDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmissionData extends AbstractEntity
{
    use Makeable;

    /**
     * @return TransmissionDataTag
     */
    public function getTag()
    {
        return TransmissionDataTag::make();
    }
}
