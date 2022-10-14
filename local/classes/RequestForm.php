<?php

namespace Local\Classes;

use Bitrix\Iblock\PropertyEnumerationTable;

class RequestForm extends AbstractIblockWrapper
{
	const IBLOCK_CODE = 'requestform';
	const IBLOCK_ID = 1;
	public static string $apiCode = 'requestform';

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
}