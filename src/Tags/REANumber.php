<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class REANumber extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $number;

    public function setREANumber(string $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('NumeroREA', $this->number);
    }
}
