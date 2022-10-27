<?php

namespace Condividendo\FatturaPA\Contracts;

interface Entity extends Makeable
{
    /**
     * @return Tag
     */
    public function getTag();
}
