<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\ShareHolders as ShareHoldersTag;
use Condividendo\FatturaPA\Traits\Makeable;

class ShareHolders extends AbstractEntity
{
    use Makeable;

    /**
     * @return ShareHoldersTag
     */
    public function getTag()
    {
        return ShareHoldersTag::make();
    }
}
