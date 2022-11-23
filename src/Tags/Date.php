<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Date extends Tag
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
        return $dom->createElement('Data', $this->date);
    }
}
