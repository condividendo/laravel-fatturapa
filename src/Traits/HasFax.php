<?php

namespace Condividendo\FatturaPA\Traits;

trait HasFax
{
    /**
     * @var string
     */
    private $fax;

    /**
     * @return self
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
        return $this;
    }
}
