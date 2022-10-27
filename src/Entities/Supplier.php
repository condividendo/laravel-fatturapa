<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Supplier as SupplierTag;

class Supplier extends AbstractEntity
{
    public function getTag(): Tag
    {
        return SupplierTag::make();
    }
}
