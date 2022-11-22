<?php

namespace Condividendo\FatturaPA\Traits;

trait HasEmail
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @return self
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
        return $this;
    }
}
