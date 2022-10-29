<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Address as AddressTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Address extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return AddressTag::make();
    }
}
