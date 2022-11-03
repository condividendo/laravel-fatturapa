<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TaxRegime extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $taxRegime;

    public function setTaxRegime(\Condividendo\FatturaPA\Enums\TaxRegime $taxRegime): self
    {
        $this->taxRegime = $taxRegime->value;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('RegimeFiscale', $this->taxRegime);
    }
}
