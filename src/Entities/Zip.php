<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Zip as ZipTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Zip extends AbstractEntity
{
    use Makeable;

    /**
     * @return ZipTag
     */
    public function getTag()
    {
        return ZipTag::make();
    }
}
