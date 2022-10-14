<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = [
	'NAME' => Loc::getMessage('СOMP_NAME'),
	'DESCRIPTION' => Loc::getMessage('COMP_DESCR'),
	'PATH' => [
		'ID' => 'RUSOIL',
	],
];
