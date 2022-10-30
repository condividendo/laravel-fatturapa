<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\LineNumber as LineNumberTag;
use Condividendo\FatturaPA\Traits\Makeable;

class LineNumber extends AbstractEntity
{
    use Makeable;

    /**
     * @return LineNumberTag
     */
    public function getTag()
    {
        return LineNumberTag::make();
    }
}
