<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\REANumber as REANumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class REANumber extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return REANumberTag::make();
    }
}
