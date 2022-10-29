<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class ProvinceOrState extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $provinceOrState;

    public function setProvinceOrState(string $provinceOrState): self
    {
        $this->provinceOrState = $provinceOrState;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Provincia', $this->provinceOrState);
    }
}
