<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\Contacts as ContactsTag;
use Condividendo\FatturaPA\Traits\HasEmail;
use Condividendo\FatturaPA\Traits\HasFax;
use Condividendo\FatturaPA\Traits\HasPhone;
use Condividendo\FatturaPA\Traits\Makeable;

class Contacts extends Entity
{
    use HasEmail;
    use HasFax;
    use HasPhone;
    use Makeable;

    public function getTag(): ContactsTag
    {
        $tag = ContactsTag::make();

        if ($this->email) {
            $tag->setEmail($this->email);
        }

        if ($this->phone) {
            $tag->setPhone($this->phone);
        }

        if ($this->fax) {
            $tag->setFax($this->fax);
        }

        return $tag;
    }
}
