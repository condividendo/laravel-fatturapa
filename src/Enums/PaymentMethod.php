<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self MP01() Contanti
 * @method static self MP02() Assegno
 * @method static self MP03() Assegno circolare
 * @method static self MP04() Contanti tesoria
 * @method static self MP05() Bonifico
 * @method static self MP06() Vaglia
 * @method static self MP07() Bollettino bancario
 * @method static self MP08() Carta di pagamento
 * @method static self MP09() Rid
 * @method static self MP10() Rid utenze
 * @method static self MP11() Rid veloce
 * @method static self MP12() Riba
 * @method static self MP13() Mav
 * @method static self MP14() Quietanza erario
 * @method static self MP15() Giroconto
 * @method static self MP16() Domiciliazione bancaria
 * @method static self MP17() Domiciliazione postale
 * @method static self MP18() Bollettino postale
 * @method static self MP19() Sepa direct
 * @method static self MP20() Sepa direct debit core
 * @method static self MP21() Sepa direct debit B2B
 * @method static self MP22() Trattenute
 * @method static self MP23() PagoPA
 */
final class PaymentMethod extends Enum
{
    public const MP01 = 'MP01';
    public const MP02 = 'MP02';
    public const MP03 = 'MP03';
    public const MP04 = 'MP04';
    public const MP05 = 'MP05';
    public const MP06 = 'MP06';
    public const MP07 = 'MP07';
    public const MP08 = 'MP08';
    public const MP09 = 'MP09';
    public const MP10 = 'MP10';
    public const MP11 = 'MP11';
    public const MP12 = 'MP12';
    public const MP13 = 'MP13';
    public const MP14 = 'MP14';
    public const MP15 = 'MP15';
    public const MP16 = 'MP16';
    public const MP17 = 'MP17';
    public const MP18 = 'MP18';
    public const MP19 = 'MP19';
    public const MP20 = 'MP20';
    public const MP21 = 'MP21';
    public const MP22 = 'MP22';
    public const MP23 = 'MP23';
}
