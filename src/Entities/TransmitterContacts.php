<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\TransmitterContacts as TransmitterContactsTag;
use Condividendo\FatturaPA\Traits\Makeable;
use Condividendo\FatturaPA\Traits\HasEmail;
use Condividendo\FatturaPA\Traits\HasPhone;

class TransmitterContacts extends AbstractEntity
{
    use Makeable;
    use HasEmail;
    use HasPhone;

    /**
     * @return TransmitterContactsTag
     */
    public function getTag()
    {
        $tag = ContactsTag::make();
        if ($this->email) {
            $tag->setEmail($this->email);
        }
        if ($this->phone) {
            $tag->setPhone($this->phone);
        }
        return $tag;
    }
}
