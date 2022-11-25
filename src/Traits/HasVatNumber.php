<?php

namespace Condividendo\FatturaPA\Traits;

trait HasVatNumber
{
    protected static function parseVatNumber(string $vatNumber, ?string $countryId = null): string
    {
        return $countryId
            ? $vatNumber
            : substr($vatNumber, 2);
    }

    protected static function parseVatNumberCountryId(string $vatNumber, ?string $countryId = null): string
    {
        return $countryId ?: substr($vatNumber, 0, 2);
    }
}
