<?php

namespace Condividendo\FatturaPA\Contracts;

interface Entity extends Makeable
{
    public function getTag(): Tag;
}
