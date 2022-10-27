<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Customer extends AbstractTag
{
    use Makeable;

    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('');
    }
}
