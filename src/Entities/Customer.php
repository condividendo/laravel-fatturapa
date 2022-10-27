<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Customer as CustomerTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Customer extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return CustomerTag::make();
    }
}
