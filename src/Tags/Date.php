<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;
use Illuminate\Support\Carbon;

class Date extends Tag
{
    use Makeable;

    /**
     * @var \Illuminate\Support\Carbon
     */
    private $date;

    public function setDate(Carbon $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('Data', $this->date->toDateString());
    }
}
