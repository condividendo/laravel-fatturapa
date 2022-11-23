<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\PaymentCondition as PaymentConditionEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentData extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Tags\PaymentCondition
     */
    private $paymentCondition;

    /**
     * @var \Condividendo\FatturaPA\Tags\PaymentDetail
     */
    private $paymentDetail;

    public function setPaymentDetail(PaymentDetail $paymentDetail): self
    {
        $this->paymentDetail = $paymentDetail;

        return $this;
    }

    public function setPaymentCondition(PaymentConditionEnum $paymentCondition): self
    {
        $this->paymentCondition = PaymentCondition::make()->setPaymentCondition($paymentCondition);

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DatiPagamento');

        $e->appendChild($this->paymentCondition->toDOMElement($dom));
        $e->appendChild($this->paymentDetail->toDOMElement($dom));

        return $e;
    }
}
