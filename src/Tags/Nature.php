<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\Nature as NatureEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Nature extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\Nature
     */
    private $nature;

    public function setNature(NatureEnum $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Natura', $this->nature->value);
    }
}
