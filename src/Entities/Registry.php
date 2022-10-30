<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Registry as RegistryTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Registry extends AbstractEntity
{
    use Makeable;

    /**
     * @return RegistryTag
     */
    public function getTag()
    {
        return RegistryTag::make();
    }
}
