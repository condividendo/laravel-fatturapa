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
    const TD01 = 'TD01';
    const TD02 = 'TD02';
    const TD03 = 'TD03';
    const TD04 = 'TD04';
    const TD05 = 'TD05';
    const TD06 = 'TD06';
}
