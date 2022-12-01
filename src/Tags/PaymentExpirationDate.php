<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;
use Illuminate\Support\Carbon;

class PaymentExpirationDate extends Tag
{
    use Makeable;

    /**
     * @var \Illuminate\Support\Carbon
     */
    private $date;

    public function setPaymentExpirationDate(Carbon $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('DataScadenzaPagamento', $this->date->toDateString());
    }
}
