<?php

namespace Local\Classes;

use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Main\Entity\ReferenceField;
use \Bitrix\Main\Mail\Event;
use Bitrix\Main\ORM\Query\Query;


class RequestForm extends AbstractIblockWrapper
{
	const IBLOCK_CODE = 'requestform';
	const IBLOCK_ID = 1;
	public static string $apiCode = 'requestform';
	const ADD_MESS_EVENT = 'NEW_MESS_ADD';

	/**
	 * Составление запроса со всеми связными таблицами
	 * 
	 * @return Query
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	public static function getQuery(): Query
	{
		$entity = self::getEntity();
		$oCategoryRef = new ReferenceField(
			'CATEGORY',
			ProductCategories::getEntity(),
			['=this.PRODUCT_CATEGORY.VALUE' => 'ref.ID']
		);
		$oWarehouseRef = new ReferenceField(
			'WAREHOUSE',
			SupplyWarehouses::getEntity(),
			['=this.SUPPLY_WAREHOUSE.VALUE' => 'ref.ID']
		);
		
		return (new Query($entity))
			->registerRuntimeField('CATEGORY', $oCategoryRef)
			->registerRuntimeField('WAREHOUSE', $oWarehouseRef)
			->setSelect([
				'ID',
				'NAME',
				'PREVIEW_TEXT',
				'PR_CATEGORY' => 'CATEGORY.NAME',
				'PR_REQUEST_TYPE' => 'REQUEST_TYPE.ITEM.VALUE',
				'PR_SUPPLY_WAREHOUSE' => 'WAREHOUSE.NAME',
			]);
	}

	/**
	 * Получение типов заявки
	 *
	 * @return array
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	public static function getRequestTypes(): array
	{
		$iPropertyId = \CIBlockPropertyEnum::GetList(
			[],
			[
				'IBLOCK_ID' => self::IBLOCK_ID,
				'CODE' => 'REQUEST_TYPE'
			]
		)->Fetch()['PROPERTY_ID'];

		return PropertyEnumerationTable::getList([
			'select' => ['*'],
			'filter' => [
				'PROPERTY_ID' => $iPropertyId,
			]
		])->fetchAll();
	}

	/**
	 * Агент отправки писем с заявками
	 * 
	 * @return string
	 */
	public static function setSendRequestMailsAgent(): string
	{
		$requests = self::getList(['ACTIVE' => 'Y']);

		foreach ($requests as &$request) {
			$aRequestItems = \CIBlockElement::GetList(
				['SORT' => 'ASC'],
				['IBLOCK_ID' => RequestItem::IBLOCK_ID, 'PROPERTY_REQUEST' => $request['ID']],
				false,
				false,
				[
					'ID',
					'NAME',
					'PROPERTY_BRAND',
					'PROPERTY_COUNT',
					'PROPERTY_PACKAGING',
					'PROPERTY_CLIENT',
				]
			);
			while ($aItem = $aRequestItems->GetNext()) {
				$request['ITEMS'][] = $aItem;
			}
			Event::send([
				'EVENT_NAME' => static::ADD_MESS_EVENT,
				'LID' => (constant('SITE_ID') ? SITE_ID : 's1'),
				'C_FIELDS' => $request
			]);
			$el = new \CIBlockElement;
			$el->Update($request['ID'], ['ACTIVE' => 'N']);
		}

		return '\\' . __METHOD__ . '();';
	}
}