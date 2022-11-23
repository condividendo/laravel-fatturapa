<?php

namespace Condividendo\FatturaPA\Traits;

trait HasPhone
{
    /**
     * @var string
     */
    protected $phone;

    /**
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
