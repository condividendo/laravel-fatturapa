<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Contacts as ContactsTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Contacts extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return ContactsTag::make();
    }
}
