<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Создать заявку');
?>
<?$APPLICATION->IncludeComponent(
	'rusoil:request.form',
	'.default',
	[
		'CACHE_TYPE' => 'N',
	],
	false
);?>


<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>