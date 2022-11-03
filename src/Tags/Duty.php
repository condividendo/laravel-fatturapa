<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Duty extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $duty;

    public function setDuty(float $duty): self
    {
        $this->duty = sprintf("%.2f",$duty);
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Imposta', $this->duty);
    }
}
