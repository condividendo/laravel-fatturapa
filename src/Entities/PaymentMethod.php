<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentMethod as PaymentMethodTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentMethod extends AbstractEntity
{
    use Makeable;

    /**
     * @return PaymentMethodTag
     */
    public function getTag()
    {
        return PaymentMethodTag::make();
    }
}
