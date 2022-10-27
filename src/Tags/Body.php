<?php

namespace Condividendo\FatturaPA\Tags;

use DOMDocument;
use DOMElement;

class Body extends AbstractTag
{
    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('FatturaElettronicaBody');
    }
}
