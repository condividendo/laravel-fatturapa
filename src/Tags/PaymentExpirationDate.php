<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentExpirationDate extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $date;

    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('DataScadenzaPagamento', $this->date);
    }
}