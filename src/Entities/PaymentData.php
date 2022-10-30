<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentData as PaymentDataTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentData extends AbstractEntity
{
    use Makeable;

    /**
     * @return PaymentDataTag
     */
    public function getTag()
    {
        return PaymentDataTag::make();
    }
}
