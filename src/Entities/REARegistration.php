<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\REARegistration as REARegistrationTag;
use Condividendo\FatturaPA\Traits\Makeable;

class REARegistration extends AbstractEntity
{
    use Makeable;

    /**
     * @return REARegistrationTag
     */
    public function getTag()
    {
        return REARegistrationTag::make();
    }
}
