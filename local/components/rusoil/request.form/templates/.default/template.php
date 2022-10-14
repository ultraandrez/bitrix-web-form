<?php 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Application;
use \Bitrix\Main\Web\Uri;
use \Bitrix\Main\Localization\Loc;

$request = Application::getInstance()->getContext()->getRequest();
$uri = new Uri($request->getRequestUri());
$action = $uri->getUri();
Loc::loadMessages(__FILE__);
?>
<h2><?=Loc::getMessage('FORM_HEADER')?></h2>
<form class="request-form" type="post" action="<?=$action?>">
    <div class="form-group">
        <label class="h3"><?=Loc::getMessage('FORM_REQUEST_TITLE')?></label>
        <input type="text" class="form-control" name="NAME" placeholder="<?=Loc::getMessage('FORM_REQUEST_TITLE_PLACEHOLDER')?>">
    </div>
    
    <div class="form-group mt-2">
        <label class="h3"><?=Loc::getMessage('FORM_CATEGORY_TITLE')?></label>
        <?php foreach ($arResult['PRODUCT_CATEGORIES'] as $iKey => $aCategory) { ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="PRODUCT_CATEGORY" id="<?=$aCategory['CODE']?>" value="<?=$aCategory['ID']?>" <?=$iKey == 0 ? 'checked' : ''?>>
                <label class="form-check-label" for="<?=$aCategory['CODE']?>">
                    <?=$aCategory['NAME']?>
                </label>
            </div>
        <?php } ?>
    </div>

    <div class="form-group mt-2">
        <label class="h3"><?=Loc::getMessage('FORM_TYPE_TITLE')?></label>
		<?php foreach ($arResult['REQUEST_TYPES'] as $iKey => $aRequestType) { ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="REQUEST_TYPE" id="<?=$aRequestType['XML_ID']?>" value="<?=$aRequestType['ID']?>" <?=$iKey == 0 ? 'checked' : ''?>>
                <label class="form-check-label" for="<?=$aRequestType['XML_ID']?>">
                    <?=$aRequestType['VALUE']?>
                </label>
            </div>
        <?php } ?>
    </div>
    
    <div class="form-inline">
        <label class="h3"><?=Loc::getMessage('FORM_WAREHOUSE_TITLE')?></label>
        <select class="form-control" name="SUPPLY_WAREHOUSE">
            <option selected><?=Loc::getMessage('FORM_WAREHOUSE_SELECT_VALUE')?></option>
			<?php foreach ($arResult['WAREHOUSES'] as $aWarehouse) { ?>
                <option value="<?=$aWarehouse['ID']?>"><?=$aWarehouse['NAME']?></option>
            <?php } ?>
        </select>
    </div>
    <input type="hidden" id="rowIndex" value="1">
    <label class="h3 mt-3"><?=Loc::getMessage('FORM_REQUEST_ITEMS_TITLE')?></label>
    <div class="items-list mt-2">
        <div class="item">
            <div class="row align-middle">
                <div class="col">
                    <label><?=Loc::getMessage('FORM_REQUEST_BRAND')?></label>
                    <select class="form-control" name="ITEM[0][PROPERTY_VALUES][BRAND]">
                        <?php foreach ($arResult['BRANDS'] as $aBrand) { ?>
                            <option value="<?=$aBrand['ID']?>"><?=$aBrand['NAME']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col">
                    <label><?=Loc::getMessage('FORM_REQUEST_NAME')?></label>
                    <input type="text" class="form-control" name="ITEM[0][NAME]">
                </div>
                <div class="col">
                    <label><?=Loc::getMessage('FORM_REQUEST_COUNT')?></label>
                    <input type="number" class="form-control" name="ITEM[0][PROPERTY_VALUES][COUNT]">
                </div>
                <div class="col">
                    <label><?=Loc::getMessage('FORM_REQUEST_PACKAGING')?></label>
                    <input type="text" class="form-control" name="ITEM[0][PROPERTY_VALUES][PACKAGING]">
                </div>
                <div class="col">
                    <label><?=Loc::getMessage('FORM_REQUEST_CLIENT')?></label>
                    <input type="text" class="form-control" name="ITEM[0][PROPERTY_VALUES][CLIENT]">
                </div>
                <div class="input-group-prepend col">
                    <button class="btn btn-danger js-delete-row" type="button">
                        <i class="bi bi-trash"></i>
                        -
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="input-group-prepend col mt-3">
        <button class="btn btn-success js-add-row" type="button">
            <i class="bi bi-plus"></i>
			<?=Loc::getMessage('FORM_REQUEST_ITEMS_ADD')?>
        </button>
    </div>

    <div class="form-group mt-3">
        <input type="file" name="FILE" class="form-control-file">
    </div>
    
    <div class="form-group purple-border mt-3">
        <label><?=Loc::getMessage('FORM_COMMENT')?></label>
        <textarea class="form-control" name="PREVIEW_TEXT" rows="6"></textarea>
    </div>
    
    <div class="request-error" style="color:red;"></div>
    
	<button type="button" class="btn btn-success mt-3 js-process-form"><?=Loc::getMessage('FORM_SUBMIT_BUTTON_TEXT')?></button>
</form>
<script type="text/javascript">
    window.selectOptions = '<?=$arResult['BRANDS_OPTIONS']?>';
</script>
