<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentExpirationDate as PaymentExpirationDateTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentExpirationDate extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return PaymentExpirationDateTag::make();
    }
}
