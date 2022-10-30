<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Fax as FaxTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Fax extends AbstractEntity
{
    use Makeable;

    /**
     * @return FaxTag
     */
    public function getTag()
    {
        return FaxTag::make();
    }
}
