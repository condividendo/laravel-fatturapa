<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Contacts extends TransmitterContacts
{
    use Makeable;

    /**
     * @var ?Fax
     */
    private $fax;


    public function setFax(string $fax): self
    {
        $this->fax = Fax::make()->setFax($fax);
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('Contatti');

        if ($this->phone) {
            $e->appendChild($this->phone->toDOMElement($dom));
        }
        if ($this->fax) {
            $e->appendChild($this->fax->toDOMElement($dom));
        }
        if ($this->email) {
            $e->appendChild($this->email->toDOMElement($dom));
        }

        return $e;
    }
}
