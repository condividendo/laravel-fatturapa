<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\PaymentCondition as PaymentConditionEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentCondition extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\PaymentCondition
     */
    private $paymentCondition;

    public function setPaymentCondition(PaymentConditionEnum $paymentCondition): self
    {
        $this->paymentCondition = $paymentCondition;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('CondizioniPagamento', $this->paymentCondition->value);
    }
}
