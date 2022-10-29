<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Email as EmailTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Email extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return EmailTag::make();
    }
}
