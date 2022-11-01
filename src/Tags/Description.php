<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Description as DescriptionTag;
use Condividendo\FatturaPA\Traits\Makeable;

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
