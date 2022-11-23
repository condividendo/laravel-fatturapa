<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class ShareHolders extends Tag
{
    use Makeable;

    /**
     * @var string
     */
    private $shareHolders;

    public function setShareHolders(string $shareHolders): self
    {
        $this->shareHolders = $shareHolders;

        return $this;
    }

    /**
     * @noinspection PhpUnhandledExceptionInspection
     */
    public function toDOMElement(DOMDocument $dom): DOMElement
    {
        return $dom->createElement('SocioUnico', $this->shareHolders);
    }
}
