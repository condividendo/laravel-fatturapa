<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentCondition as PaymentConditionTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentCondition extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return PaymentConditionTag::make();
    }
}
