<?php

use Bitrix\Main\Loader;

//main is usually included directly
$documentRoot = Loader::getDocumentRoot();
Loader::registerNamespace("Local\\Classes", $documentRoot."/local/classes/");
Loader::includeModule("iblock");

