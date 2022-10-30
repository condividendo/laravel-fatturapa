<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\CompanyName as CompanyNameTag;
use Condividendo\FatturaPA\Traits\Makeable;

class CompanyName extends AbstractEntity
{
    use Makeable;

    /**
     * @return CompanyNameTag
     */
    public function getTag()
    {
        return CompanyNameTag::make();
    }
}
