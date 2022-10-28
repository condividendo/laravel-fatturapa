<?php

namespace Condividendo\FatturaPA\Enums;

use BenSampo\Enum\Enum;

/**
 * @property string $value
 * @method static self N2_1() non soggette ad IVA ai sensi degli artt. da 7 a 7-septies del DPR 633/72
 * @method static self N2_2() non soggette – altri casi
 * @method static self N3_1() non imponibili – esportazioni
 * @method static self N3_2() non imponibili – cessioni intracomunitarie
 * @method static self N3_3() non imponibili – cessioni verso San Marino
 * @method static self N3_4() non imponibili – operazioni assimilate alle cessioni all’esportazione
 * @method static self N3_5() non imponibili – a seguito di dichiarazioni d’intento
 * @method static self N3_6() non imponibili – altre operazioni che non concorrono alla formazione del plafond
 * @method static self N4() esenti
 * @method static self N5() regime del margine / IVA non esposta in fattura
 * @method static self N6.1() inversione contabile – cessione di rottami e altri materiali di recupero
 * @method static self N6.2() inversione contabile – cessione di oro e argento puro
 * @method static self N6.3() inversione contabile – subappalto nel settore edile
 * @method static self N6.4() inversione contabile – cessione di fabbricati
 * @method static self N6.5() inversione contabile – cessione di telefoni cellulari
 * @method static self N6.6() inversione contabile – cessione di prodotti elettronici
 * @method static self N6.7() inversione contabile – prestazioni comparto edile e settori connessi
 * @method static self N6.8() inversione contabile – operazioni settore energetico
 * @method static self N6.9() inversione contabile – altri casi
 */
final class Nature extends Enum
{
    const N2_1 = 'N2.1';
    const N2_2 = 'N2.2';
    const N3_1 = 'N3.1';
    const N3_2 = 'N3.2';
    const N3_3 = 'N3.3';    
    const N3_4 = 'N3.4';    
    const N3_5 = 'N3.5';    
    const N3_6 = 'N3.6';     
    const N4 = 'N4'; 
    const N5 = 'N5'; 
    const N6_1 = 'N6.1'; 
    const N6_2 = 'N6.2'; 
    const N6_3 = 'N6.3'; 
    const N6_4 = 'N6.4'; 
    const N6_5 = 'N6.5'; 
    const N6_6 = 'N6.6'; 
    const N6_7 = 'N6.7'; 
    const N6_8 = 'N6.8'; 
    const N6_9 = 'N6.9'; 
    
}
