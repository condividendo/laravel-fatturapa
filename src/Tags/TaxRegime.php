<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Enums\TaxRegime as TaxRegimeEnum;
use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TaxRegime extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $taxRegime;

    public function setTaxRegime(TaxRegimeEnum $taxRegime): self
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
