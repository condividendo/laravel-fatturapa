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
    const MP01 = 'MP01';
    const MP02 = 'MP02';
    const MP03 = 'MP03';
    const MP04 = 'MP04';
    const MP05 = 'MP05';
    const MP06 = 'MP06';
    const MP07 = 'MP07';
    const MP08 = 'MP08';
    const MP09 = 'MP09';
    const MP10 = 'MP10';
    const MP11 = 'MP11';
    const MP12 = 'MP12';
    const MP13 = 'MP13';
    const MP14 = 'MP14';
    const MP15 = 'MP15';
    const MP16 = 'MP16';
    const MP17 = 'MP17';
    const MP18 = 'MP18';
    const MP19 = 'MP19';
    const MP20 = 'MP20';
    const MP21 = 'MP21';
    const MP22 = 'MP22';
    const MP23 = 'MP23';
}
