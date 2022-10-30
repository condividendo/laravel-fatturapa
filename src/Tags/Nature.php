<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Nature extends AbstractTag
{

    use Makeable;

    /**
     * @var string
     */
    private $nature;

    public function setNature(string $nature): self
    {
        $this->nature = $nature;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Natura', $this->nature);
    }
}
