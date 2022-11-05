<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Registry extends AbstractTag
{
    use Makeable;

    /**
     * @var ?CompanyName
     */
    private $companyName;

    /**
     * @var ?FirstName
     */
    private $firstName;

    /**
     * @var ?LastName
     */
    private $lastName;

    /**
     * @var ?Title
     */
    private $title;


    public function setCompanyName(string $companyName): self
    {
        $this->companyName = CompanyName::make()->setName($companyName);
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = Title::make()->setTitle($title);
        return $this;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = FirstName::make()->setName($firstName);
        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = LastName::make()->setName($lastName);
        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        $e = $dom->createElement('Anagrafica');

        if ($this->companyName) {
            $e->appendChild($this->companyName->toDOMElement($dom));
        } else {
            assert(!empty($this->firstName) && !empty($this->lastName), "Please specify either Company Name, or physical person name and last name");
            if ($this->title) {
                $e->appendChild($this->title->toDOMElement($dom));
            }
            $e->appendChild($this->firstName->toDOMElement($dom));
            $e->appendChild($this->lastName->toDOMElement($dom));
        }

        return $e;
    }
}
