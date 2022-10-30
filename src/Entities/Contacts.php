<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Contacts as ContactsTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Contacts extends AbstractEntity
{
    use Makeable;

    /**
     * @return ContactsTag
     */
    public function getTag()
    {
        return ContactsTag::make();
    }
}
