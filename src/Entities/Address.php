<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Address as AddressTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Address extends AbstractEntity
{
    use Makeable;

    /**
     * @return AddressTag
     */
    public function getTag()
    {
        return AddressTag::make();
    }
}
