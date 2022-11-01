<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self TD01() Fattura
 * @method static self TD04() Nota di credito
 */
final class Type extends Enum
{
    public const TD01 = 'TD01';
    public const TD02 = 'TD02';
    public const TD03 = 'TD03';
    public const TD04 = 'TD04';
    public const TD05 = 'TD05';
    public const TD06 = 'TD06';
}
