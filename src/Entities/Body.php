<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Body as BodyTag;

class Body extends AbstractEntity
{
    public function getTag(): Tag
    {
        return BodyTag::make();
    }
}
