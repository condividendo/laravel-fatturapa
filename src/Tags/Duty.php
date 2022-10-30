<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Duty extends AbstractTag
{

    use Makeable;

    /**
     * @var float
     */
    private $duty;

    public function setDuty(float $duty): self
    {
        $this->duty = $duty;
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
