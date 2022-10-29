<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmissionSequence as TransmissionSequenceTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmissionSequence extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return TransmissionSequenceTag::make();
    }
}
