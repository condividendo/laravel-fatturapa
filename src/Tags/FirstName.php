<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class FirstName extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $name;

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Nome', $this->name);
    }
}
