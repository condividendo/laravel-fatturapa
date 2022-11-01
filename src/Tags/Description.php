<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Traits\Makeable;
use DOMDocument;
use DOMElement;

class Description extends AbstractTag
{
    use Makeable;

    /**
     * @var string
     */
    private $description;
    
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return DescriptionTag
     */
    public function getTag()
    {
        return DescriptionTag::make();
    }
}
