<?php

use Bitrix\Main\Application;
use Local\Classes\Brands;
use Local\Classes\ProductCategories;
use Local\Classes\RequestItem;
use Local\Classes\SupplyWarehouses;
use Local\Classes\RequestForm;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class RequestFormComponent extends \CBitrixComponent
{
	public $arResult;
	public $arParams;
	public $allowFields = [
		'NAME' 				=> 'DEF',
		'PREVIEW_TEXT' 		=> 'DEF',
		'PRODUCT_CATEGORY' 	=> 'PROP',
		'REQUEST_TYPE' 		=> 'PROP',
		'SUPPLY_WAREHOUSE' 	=> 'PROP',
		'FILE' 				=> 'PROP',
	];
	
	public function onPrepareComponentParams($arParams): array
	{
		return $arParams;
	}
	
	public function initVars() 
	{
		$this->arResult['BRANDS'] = Brands::getList();
		$this->arResult['REQUEST_TYPES'] = RequestForm::getRequestTypes();
		$this->arResult['WAREHOUSES'] = SupplyWarehouses::getList();
		$this->arResult['PRODUCT_CATEGORIES'] = ProductCategories::getList();
	}
	
	public function processFormSubmit()
	{
		global $APPLICATION, $DB;
		
		$aResponse = ['success' => false, 'error' => ''];
		$request = Application::getInstance()->getContext()->getRequest();
		
		if ($request->getPost('ajaxForm') == 'Y') {
			$APPLICATION->RestartBuffer();

			$aFields = [];
			foreach ($request->getPostList() as $postCode => $postValue) {
				//Используем только существующие поля
				if (!array_key_exists($postCode, $this->allowFields))
					continue;
				if ($this->allowFields[$postCode] === 'PROP') {
					$aFields['PROPERTY_VALUES'][$postCode] = $postValue;
				} else {
					$aFields[$postCode] = $postValue;
				}
			}
			$aFields += [
				'ACTIVE' => 'Y',
				'IBLOCK_ID' => RequestForm::IBLOCK_ID
			];
			$el = new CIBlockElement;
			$DB->StartTransaction();
			try {
				if ($formIbElement = $el->Add($aFields)) {
					if (($requestProducts = $request->getPost('ITEM')) && is_array($requestProducts)) {
						$aFields = ['ACTIVE' => 'Y', 'IBLOCK_ID' => RequestItem::IBLOCK_ID];
						foreach ($requestProducts as $product) {
							$elProduct = new CIBlockElement;
							$aProductFields = array_merge($product, $aFields);
							$aProductFields['PROPERTY_VALUES']['REQUEST'] = $formIbElement;
							if (!$elProduct->Add($aProductFields)) {
								throw new Exception($el->LAST_ERROR);
							}
						}
					}
				} else {
					throw new Exception($el->LAST_ERROR);
				}
				$aResponse['success'] = true;
				$DB->Commit();
			} catch (Exception $e) {
				$aResponse['error'] = $e->getMessage();
				$DB->Rollback();
			}
			
			header('Content-Type: application/json');
			echo json_encode($aResponse);
			die();
		}
	}

	public function executeComponent()
	{
		$this->initVars();
		$this->processFormSubmit();
		$this->includeComponentTemplate();
	}

}