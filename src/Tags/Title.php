<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Title extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $title;

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Titolo', $this->title);
    }
}
