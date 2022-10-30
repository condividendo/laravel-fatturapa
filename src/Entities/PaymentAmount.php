<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentAmount as PaymentAmountTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentAmount extends AbstractEntity
{
    use Makeable;

    /**
     * @return PaymentAmountTag
     */
    public function getTag()
    {
        return PaymentAmountTag::make();
    }
}
