<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Customer as CustomerTag;

class Customer extends AbstractEntity
{
    public function getTag(): Tag
    {
        return CustomerTag::make();
    }
}
