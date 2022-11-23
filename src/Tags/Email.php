<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Email extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $email;

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Email', $this->email);
    }
}
