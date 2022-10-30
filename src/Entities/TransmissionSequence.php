<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmissionSequence as TransmissionSequenceTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmissionSequence extends AbstractEntity
{
    use Makeable;

    /**
     * @return TransmissionSequenceTag
     */
    public function getTag()
    {
        return TransmissionSequenceTag::make();
    }
}
