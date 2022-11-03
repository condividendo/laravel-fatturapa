<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentCondition extends AbstractTag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\PaymentCondition
     */
    private $paymentCondition;

    public function setPaymentCondition(\Condividendo\FatturaPA\Enums\PaymentCondition $paymentCondition): self
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
