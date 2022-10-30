<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\PaymentDetail as PaymentDetailTag;
use Condividendo\FatturaPA\Traits\Makeable;

class PaymentDetail extends AbstractEntity
{
    use Makeable;

    /**
     * @return PaymentDetailTag
     */
    public function getTag()
    {
        return PaymentDetailTag::make();
    }
}
