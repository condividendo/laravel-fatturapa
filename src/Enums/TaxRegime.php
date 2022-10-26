<?php
namespace Condividendo\FatturaPA\Enums;

// <RegimeFiscale>
// https://fatturapertutti.it/Blog/fattura-elettronica-pa-codifiche-regime-fiscale-1
enum TaxRegime:string
{
    case RF01 = 'RF01';
    case RF02 = 'RF02';
    case RF03 = 'RF03';
    case RF04 = 'RF04';
    case RF05 = 'RF05';
    case RF06 = 'RF06';
    case RF07 = 'RF07';
    case RF08 = 'RF08';
    case RF09 = 'RF09';
    case RF10 = 'RF10';
    case RF11 = 'RF11';
    case RF12 = 'RF12';
    case RF13 = 'RF13';
    case RF14 = 'RF14';
    case RF15 = 'RF15';
    case RF16 = 'RF16';
    case RF17 = 'RF17';
    case RF18 = 'RF18';
    case RF19 = 'RF19';
    
    public const ORDINARIO = self::RF01;
    public const CONTRIBUENTI_MINIMI = self::RF02;
    public const ALTRO = self::RF18;
    public const REGIME_FORFETTARIO = self::RF19;
}
