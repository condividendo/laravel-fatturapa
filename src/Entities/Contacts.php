<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Contacts as ContactsTag;
use Condividendo\FatturaPA\Traits\Makeable;
use Condividendo\FatturaPA\Traits\HasEmail;
use Condividendo\FatturaPA\Traits\HasPhone;
use Condividendo\FatturaPA\Traits\HasFax;

class Contacts extends AbstractEntity
{
    use Makeable;
    use HasEmail;
    use HasPhone;
    use HasFax;

    /**
     * @return ContactsTag
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
        if ($this->fax) {
            $tag->setFax($this->fax);
        }
        return $tag;
    }
}
