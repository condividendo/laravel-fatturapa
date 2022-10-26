<?php
namespace Condividendo\FatturaPA\Enums;

// <StatoLiquidazione>
enum Liquidation:string
{
    case LS = 'LS';
    case IN_LIQUIDAZIONE = 'LS';
    case LN = 'LN';
    case NON_IN_LIQUIDAZIONE = 'LN';
}
