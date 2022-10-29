<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class LiquidationStatus extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $status;

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('StatoLiquidazione', $this->status);
    }
}
