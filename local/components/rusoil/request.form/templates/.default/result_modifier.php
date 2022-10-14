<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$selectOptions = '';
foreach ($arResult['BRANDS'] as $aBrand) {
	$selectOptions .= '<option value="' . $aBrand['ID'] . '">' . $aBrand['NAME'] . '</option>';
} 
$arResult['BRANDS_OPTIONS'] = $selectOptions;