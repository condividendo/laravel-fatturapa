<?php

namespace Condividendo\FatturaPA\Tags;

use Brick\Math\BigDecimal;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentAmount extends Tag
{
    use Makeable;

    /**
     * @var \Brick\Math\BigDecimal
     */
    private $amount;

    public function setAmount(BigDecimal $amount): self
    {
        static::checkScale($amount);

        $this->amount = $amount;

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
