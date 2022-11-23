<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\LiquidationStatus as LiquidationStatusEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class LiquidationStatus extends Tag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\LiquidationStatus
     */
    private $status;

    public function setLiquidationStatus(LiquidationStatusEnum $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('StatoLiquidazione', $this->status->value);
    }
}
