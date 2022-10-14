<?php defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED === true || die();

use Bitrix\Main\Loader;

//main is usually included directly
$documentRoot = Loader::getDocumentRoot();
Loader::registerNamespace("Local\\Classes", $documentRoot."/local/classes/");
Loader::includeModule("iblock");

//Bitrix\Main\Loader::registerAutoLoadClasses(null, array(
//	'\Local' => '/local/classes/',
//));
?>

<!DOCTYPE html>
<html>
<head>
    <!-- meta -->
    <meta charset="UTF-8"/>

    <meta name="robots" content="index,follow"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <?php
//    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/jquery.min.js");
    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <?php
    $APPLICATION->ShowHead(); ?>

    <title><?php $APPLICATION->ShowTitle() ?></title>
</head>
<body>
<div class="container">
    <header class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="/">RUSOIL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Заявка</a>
                <a class="nav-item nav-link" href="#">Features</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
                <a class="nav-item nav-link" href="#">Disabled</a>
            </div>
        </div>
    </header>
