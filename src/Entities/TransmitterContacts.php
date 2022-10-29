<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmitterContacts as TransmitterContactsTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmitterContacts extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return TransmitterContactsTag::make();
    }
}
