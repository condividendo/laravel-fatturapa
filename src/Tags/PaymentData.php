<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentData extends AbstractTag
{
    use Makeable;

    /**
     * @var PaymentCondition
     */
    private $paymentCondition;

    /**
     * @var PaymentDetail
     */
    private $paymentDetail;


    public function setPaymentDetail(PaymentDetail $paymentDetail): self
    {
        $this->paymentDetail = $paymentDetail;
        return $this;
    }

    public function setPaymentCondition(PaymentCondition $paymentCondition): self
    {
        $this->paymentCondition = $paymentCondition;
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
