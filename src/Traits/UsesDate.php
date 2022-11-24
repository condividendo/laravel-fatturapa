<?php

namespace Condividendo\FatturaPA\Traits;

use Illuminate\Support\Carbon;

trait UsesDate
{
    /**
     * @param string|\Illuminate\Support\Carbon $date
     */
    protected static function makeDate($date): Carbon
    {
        /** @phpstan-ignore-next-line */
        return Carbon::make($date);
    }
}
