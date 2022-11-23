<?php

namespace Condividendo\FatturaPA\Traits;

trait HasFax
{
    /**
     * @var string
     */
    private $fax;

    /**
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }
}
