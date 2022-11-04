<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class TransmitterContacts extends AbstractTag
{
    use Makeable;

    /**
     * @var ?Email
     */
    protected $email;

    /**
     * @var ?Phone
     */
    protected $phone;


    public function setEmail(string $email): self
    {
        $this->email = Email::make()->setEmail($email);
        return $this;
    }


    public function setPhone(string $phone): self
    {
        $this->phone = Phone::make()->setPhone($phone);
        return $this;
    }


    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('ContattiTrasmittente');

        if ($this->email) {
            $e->appendChild($this->email->toDOMElement($dom));
        }
        if ($this->phone) {
            $e->appendChild($this->phone->toDOMElement($dom));
        }

        return $e;
    }
}
