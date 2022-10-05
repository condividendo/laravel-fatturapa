<?php

namespace Condividendo\FatturaPA;

use SimpleXMLElement;

class FatturaPABuilder
{
    /**
     * @var string
     */
    private $recipientCode;

    public function setRecipientCode(string $code): self
    {
        $this->recipientCode = $code;
        return $this;
    }

    public function toXML(): SimpleXMLElement
    {
        return new SimpleXMLElement('<a></a>');
    }
}
