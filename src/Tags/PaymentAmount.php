<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentAmount extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $amount;

    public function setAmount(float $amount): self
    {
        $this->amount = sprintf("%.2f", $amount);
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('ImportoPagamento', $this->amount);
    }
}
