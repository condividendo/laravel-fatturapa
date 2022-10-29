<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\CompanyName as CompanyNameTag;
use Condividendo\FatturaPA\Traits\Makeable;

class CompanyName extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return CompanyNameTag::make();
    }
}
