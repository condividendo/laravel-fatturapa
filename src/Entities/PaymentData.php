<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentData extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return PaymentDataTag::make();
    }
}
