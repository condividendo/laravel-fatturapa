<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmitterId as TransmitterIdTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmitterId extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return TransmitterIdTag::make();
    }
}
