<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentDetail extends AbstractTag
{
    use Makeable;

    /**
     * @var PaymentMethod
     */
    private $paymentMethod;

    /**
     * @var PaymentExpirationDate
     */
    private $paymentExpirationDate;

    /**
     * @var PaymentAmount
     */
    private $amount;


    public function setPaymentMethod(\Condividendo\FatturaPA\Enums\PaymentMethod $paymentMethod): self
    {
        $this->paymentMethod = PaymentMethod::make()->setPaymentMethod($paymentMethod);
        return $this;
    }

    public function setPaymentExpirationDate(string $date): self
    {
        $this->paymentExpirationDate = PaymentExpirationDate::make()->setPaymentExpirationDate($date);
        return $this;
    }

    public function setPaymentAmount(BigDecimal $amount): self
    {
        $this->amount = PaymentAmount::make()->setAmount($amount);
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('DettaglioPagamento');

        $e->appendChild($this->paymentMethod->toDOMElement($dom));
        $e->appendChild($this->paymentExpirationDate->toDOMElement($dom));
        $e->appendChild($this->amount->toDOMElement($dom));


        return $e;
    }
}
