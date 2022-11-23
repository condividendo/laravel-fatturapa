<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\TransmitterContacts as TransmitterContactsTag;
use Condividendo\FatturaPA\Traits\HasEmail;
use Condividendo\FatturaPA\Traits\HasPhone;
use Condividendo\FatturaPA\Traits\Makeable;

class TransmitterContacts extends Entity
{
    use Makeable;
    use HasEmail;
    use HasPhone;

    public function getTag(): TransmitterContactsTag
    {
        $tag = TransmitterContactsTag::make();

        if ($this->email) {
            $tag->setEmail($this->email);
        }

        if ($this->phone) {
            $tag->setPhone($this->phone);
        }

        return $tag;
    }
}
