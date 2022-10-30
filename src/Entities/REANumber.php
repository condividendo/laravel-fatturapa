<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\REANumber as REANumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class REANumber extends AbstractEntity
{
    use Makeable;

    /**
     * @return REANumberTag
     */
    public function getTag()
    {
        return REANumberTag::make();
    }
}
