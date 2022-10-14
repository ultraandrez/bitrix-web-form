<?php
namespace Local\Classes;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\ORM\Query\Query;

abstract class AbstractIblockWrapper
{
	public static string $apiCode;
	
	/**
	 * Выборка элементов
	 * 
	 * @param array $filter
	 * @return array
	 */
	public static function getList(array $filter = []): array
	{
		try {
			$aElements = self::getQuery();
			if ($filter) {
				$aElements->setFilter($filter);
			}
			return $aElements->exec()->fetchAll();
		} catch (\Throwable $e) {
			return [];
		}
	}

	/**
	 * Составление запроса
	 *
	 * @param array $select
	 * @return Query
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	private static function getQuery(array $select = []): Query
	{
		$entity = self::getEntity();
		if (!$select)
			$select = ['*'];
		return (new Query($entity))
			->setSelect($select);
	}

	/**
	 * Компиляция сущности инфоблока
	 * 
	 * @return mixed
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	public static function getEntity()
	{
		return IblockTable::compileEntity(static::$apiCode);
	}
}