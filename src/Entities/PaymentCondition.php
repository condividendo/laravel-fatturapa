<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentCondition as PaymentConditionTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentCondition extends AbstractEntity
{
    use Makeable;

    /**
     * @return PaymentConditionTag
     */
    public function getTag()
    {
        return PaymentConditionTag::make();
    }
}
