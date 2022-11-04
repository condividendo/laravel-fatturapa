<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentMethod extends AbstractTag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\PaymentMethod
     */
    private $method;

    public function setPaymentMethod(\Condividendo\FatturaPA\Enums\PaymentMethod $method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('ModalitaPagamento', $this->method->value);
    }
}
