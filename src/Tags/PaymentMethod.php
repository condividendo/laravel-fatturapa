<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class PaymentMethod extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $method;

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('ModalitaPagamento', $this->method);
    }
}
