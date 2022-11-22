<?php

namespace Condividendo\FatturaPA\Traits;

trait HasPhone
{
    /**
     * @var string
     */
    protected $phone;

    /**
     * @return self
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
        return $this;
    }
}
