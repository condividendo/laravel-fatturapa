<?php
namespace Condividendo\FatturaPA\Enums;

// <CondizioniPagamento>
enum PaymentCondition:string
{
    case TP01 = 'TP01';
    case TP02 = 'TP02';
    case TP03 = 'TP03';
    
    public const A_RATE = self::TP01;
    public const UNICO = self::TP02;
    public const CON_ANTICIPO = self::TP03;
}
