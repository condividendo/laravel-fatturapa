<?php
namespace Condividendo\FatturaPA\Enums;

// <ModalitaPagamento>
enum PaymentMethod:string
{
    case MP01 = 'MP01';
    case MP02 = 'MP02';
    case MP03 = 'MP03';
    case MP04 = 'MP04';
    case MP05 = 'MP05';
    case MP06 = 'MP06';
    case MP07 = 'MP07';
    case MP08 = 'MP08';
    case MP09 = 'MP09';
    case MP10 = 'MP10';
    case MP11 = 'MP11';
    case MP12 = 'MP12';
    case MP13 = 'MP13';
    case MP14 = 'MP14';
    case MP15 = 'MP15';
    case MP16 = 'MP16';
    case MP17 = 'MP17';
    case MP18 = 'MP18';
    case MP19 = 'MP19';
    case MP20 = 'MP20';
    case MP21 = 'MP21';
    case MP22 = 'MP22';
    case MP23 = 'MP23';
    
    public const CONTANTI = self::MP01;
    public const ASSEGNO = self::MP02;
    public const ASSEGNO_CIRCOLARE = self::MP03;
    public const CONTANTI_TESORIA = self::MP04;
    public const BONIFICO = self::MP05;
    public const VAGLIA = self::MP06;
    public const BOLLETTINO_BANCARIO = self::MP07;
    public const CARTA = self::MP08;
    public const RID = self::MP09;
    public const RID_UTENZE = self::MP10;
    public const RID_VELOCE = self::MP11;
    public const RIBA = self::MP12;
    public const MAV = self::MP13;
    public const QUIETANZA_ERARIO = self::MP14;
    public const GIROCONTO = self::MP15;
    public const DOMICILIAZIONE_BANCARIA = self::MP16;
    public const DOMICILIAZIONE_POSTALE = self::MP17;
    public const BOLLETTINO_POSTALE = self::MP18;
    public const SEPA_DIRECT = self::MP19;
    public const SEPA_DIRECT_DEBIT_CORE = self::MP20;
    public const SEPA_DIRECT_DEBIT_B2B = self::MP21;
    public const TRATTENUTE = self::MP22;
    public const PAGOPA = self::MP23;
    
}
