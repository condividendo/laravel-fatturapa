<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\GeneralData as GeneralDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class GeneralData extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return GeneralDataTag::make();
    }
}
