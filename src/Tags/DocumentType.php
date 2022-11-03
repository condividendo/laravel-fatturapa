<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class DocumentType extends AbstractTag
{
    use Makeable;

    /**
     * @var \Condividendo\FatturaPA\Enums\Type
     */
    private $type;

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('TipoDocumento', $this->type->value);
    }
}
