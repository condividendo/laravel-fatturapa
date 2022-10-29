<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmissionData as TransmissionDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmissionData extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return TransmissionDataTag::make();
    }
}
