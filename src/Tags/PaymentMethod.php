<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\PaymentMethod as PaymentMethodEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentMethod extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\PaymentMethod
     */
    private $method;

    public function setPaymentMethod(PaymentMethodEnum $method): self
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
