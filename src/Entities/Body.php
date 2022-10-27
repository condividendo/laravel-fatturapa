<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Tags\Body as BodyTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Body extends AbstractEntity
{
    use Makeable;

    /**
     * @return BodyTag
     */
    public function getTag()
    {
        return BodyTag::make();
    }
}
