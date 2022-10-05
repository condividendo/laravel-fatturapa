<?php

namespace Condividendo\FatturaPA;

class FatturaPA
{
    public static function build(): FatturaPABuilder
    {
        return new FatturaPABuilder();
    }
}
