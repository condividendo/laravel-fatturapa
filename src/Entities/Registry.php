<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Registry as RegistryTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Registry extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return RegistryTag::make();
    }
}
