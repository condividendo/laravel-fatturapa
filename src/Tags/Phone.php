<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Phone extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $phone;

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Telefono', $this->phone);
    }
}
