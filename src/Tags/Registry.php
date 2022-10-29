<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Registry extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $title;

    
    public function setCompanyName(CompanyName $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function setTitle(Title $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setFirstName(FirstName $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(LastName $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('Anagrafica');

        if($this->$companyName) $e->appendChild($this->companyName->toDOMElement($dom));
        else {
            $e->appendChild($this->title->toDOMElement($dom));
            $e->appendChild($this->firstName->toDOMElement($dom));
            $e->appendChild($this->lastName->toDOMElement($dom));
        }

        return $e;
    }
}
