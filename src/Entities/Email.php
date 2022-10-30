<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Email as EmailTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Email extends AbstractEntity
{
    use Makeable;

    /**
     * @return EmailTag
     */
    public function getTag()
    {
        return EmailTag::make();
    }
}
