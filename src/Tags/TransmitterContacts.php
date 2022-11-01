<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TransmitterContacts extends AbstractTag
{
    use Makeable;

    /**
     * @var Email
     */
    protected $email;

    /**
     * @var Phone
     */
    protected $phone;


    public function setEmail(Email $email): self
    {
        $this->email = $email;
        return $this;
    }
    

    public function setPhone(Phone $phone): self
    {
        $this->phone = $phone;
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('ContattiTrasmittente');

        if($this->email) $e->appendChild($this->email->toDOMElement($dom));
        if($this->phone) $e->appendChild($this->phone->toDOMElement($dom));

        return $e;
    }
}
