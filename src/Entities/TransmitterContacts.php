<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmitterContacts as TransmitterContactsTag;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmitterContacts extends AbstractEntity
{
    use Makeable;

    /**
     * @return TransmitterContactsTag
     */
    public function getTag()
    {
        return TransmitterContactsTag::make();
    }
}
