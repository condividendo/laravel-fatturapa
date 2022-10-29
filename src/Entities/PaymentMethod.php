<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentMethod as PaymentMethodTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentMethod extends AbstractEntity
{
    use Makeable;

    public function getTag(): Tag
    {
        return PaymentMethodTag::make();
    }
}
