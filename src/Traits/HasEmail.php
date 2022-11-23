<?php

namespace Condividendo\FatturaPA\Traits;

trait HasEmail
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
