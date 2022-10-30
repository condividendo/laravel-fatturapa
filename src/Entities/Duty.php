<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Duty as DutyTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Duty extends AbstractEntity
{
    use Makeable;

    /**
     * @return DutyTag
     */
    public function getTag()
    {
        return DutyTag::make();
    }
}
