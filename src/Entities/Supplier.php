<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Supplier as SupplierTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Supplier extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return SupplierTag::make();
    }
}
