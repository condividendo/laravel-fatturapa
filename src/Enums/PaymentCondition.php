<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self TP01() A rate
 * @method static self TP02() Unico
 * @method static self TP03() Con anticipo
 */
final class PaymentCondition extends Enum
{
    public const TP01 = 'TP01';
    public const TP02 = 'TP02';
    public const TP03 = 'TP03';
}
