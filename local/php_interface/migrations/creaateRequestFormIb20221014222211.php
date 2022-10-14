<?php

namespace Sprint\Migration;


class creaateRequestFormIb20221014222211 extends Version
{
	protected $description = "Создание ИБ с данными формы заявки";

	protected $moduleVersion = "4.0.0";

	/**
	 * @return bool|void
	 * @throws Exceptions\HelperException
	 */
	public function up()
	{
		$helper = $this->getHelperManager();
		$iblockId = $helper->Iblock()->saveIblock(array(
			'IBLOCK_TYPE_ID' => 'content',
			'LID' =>
				array(
					0 => 's1',
				),
			'CODE' => 'requestform',
			'API_CODE' => 'requestform',
			'REST_ON' => 'N',
			'NAME' => 'Форма заявки',
			'ACTIVE' => 'Y',
			'SORT' => '500',
			'LIST_PAGE_URL' => '#SITE_DIR#/',
			'DETAIL_PAGE_URL' => '',
			'SECTION_PAGE_URL' => '',
			'CANONICAL_PAGE_URL' => '',
			'PICTURE' => NULL,
			'DESCRIPTION' => '',
			'DESCRIPTION_TYPE' => 'text',
			'RSS_TTL' => '24',
			'RSS_ACTIVE' => 'Y',
			'RSS_FILE_ACTIVE' => 'N',
			'RSS_FILE_LIMIT' => NULL,
			'RSS_FILE_DAYS' => NULL,
			'RSS_YANDEX_ACTIVE' => 'N',
			'XML_ID' => NULL,
			'INDEX_ELEMENT' => 'Y',
			'INDEX_SECTION' => 'Y',
			'WORKFLOW' => 'N',
			'BIZPROC' => 'N',
			'SECTION_CHOOSER' => 'L',
			'LIST_MODE' => '',
			'RIGHTS_MODE' => 'S',
			'SECTION_PROPERTY' => 'N',
			'PROPERTY_INDEX' => 'N',
			'VERSION' => '1',
			'LAST_CONV_ELEMENT' => '0',
			'SOCNET_GROUP_ID' => NULL,
			'EDIT_FILE_BEFORE' => '',
			'EDIT_FILE_AFTER' => '',
			'SECTIONS_NAME' => 'Разделы',
			'SECTION_NAME' => 'Раздел',
			'ELEMENTS_NAME' => 'Элементы',
			'ELEMENT_NAME' => 'Элемент',
			'EXTERNAL_ID' => NULL,
			'LANG_DIR' => '/',
			'SERVER_NAME' => '',
			'IPROPERTY_TEMPLATES' =>
				array(),
			'ELEMENT_ADD' => 'Добавить элемент',
			'ELEMENT_EDIT' => 'Изменить элемент',
			'ELEMENT_DELETE' => 'Удалить элемент',
			'SECTION_ADD' => 'Добавить раздел',
			'SECTION_EDIT' => 'Изменить раздел',
			'SECTION_DELETE' => 'Удалить раздел',
		));
		$helper->Iblock()->saveIblockFields($iblockId, array(
			'IBLOCK_SECTION' =>
				array(
					'NAME' => 'Привязка к разделам',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' =>
						array(
							'KEEP_IBLOCK_SECTION_ID' => 'N',
						),
				),
			'ACTIVE' =>
				array(
					'NAME' => 'Активность',
					'IS_REQUIRED' => 'Y',
					'DEFAULT_VALUE' => 'Y',
				),
			'ACTIVE_FROM' =>
				array(
					'NAME' => 'Начало активности',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '',
				),
			'ACTIVE_TO' =>
				array(
					'NAME' => 'Окончание активности',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '',
				),
			'SORT' =>
				array(
					'NAME' => 'Сортировка',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '0',
				),
			'NAME' =>
				array(
					'NAME' => 'Название',
					'IS_REQUIRED' => 'Y',
					'DEFAULT_VALUE' => '',
				),
			'PREVIEW_PICTURE' =>
				array(
					'NAME' => 'Картинка для анонса',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' =>
						array(
							'FROM_DETAIL' => 'N',
							'SCALE' => 'N',
							'WIDTH' => '',
							'HEIGHT' => '',
							'IGNORE_ERRORS' => 'N',
							'METHOD' => 'resample',
							'COMPRESSION' => 95,
							'DELETE_WITH_DETAIL' => 'N',
							'UPDATE_WITH_DETAIL' => 'N',
							'USE_WATERMARK_TEXT' => 'N',
							'WATERMARK_TEXT' => '',
							'WATERMARK_TEXT_FONT' => '',
							'WATERMARK_TEXT_COLOR' => '',
							'WATERMARK_TEXT_SIZE' => '',
							'WATERMARK_TEXT_POSITION' => 'tl',
							'USE_WATERMARK_FILE' => 'N',
							'WATERMARK_FILE' => '',
							'WATERMARK_FILE_ALPHA' => '',
							'WATERMARK_FILE_POSITION' => 'tl',
							'WATERMARK_FILE_ORDER' => NULL,
						),
				),
			'PREVIEW_TEXT_TYPE' =>
				array(
					'NAME' => 'Тип описания для анонса',
					'IS_REQUIRED' => 'Y',
					'DEFAULT_VALUE' => 'text',
				),
			'PREVIEW_TEXT' =>
				array(
					'NAME' => 'Описание для анонса',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '',
				),
			'DETAIL_PICTURE' =>
				array(
					'NAME' => 'Детальная картинка',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' =>
						array(
							'SCALE' => 'N',
							'WIDTH' => '',
							'HEIGHT' => '',
							'IGNORE_ERRORS' => 'N',
							'METHOD' => 'resample',
							'COMPRESSION' => 95,
							'USE_WATERMARK_TEXT' => 'N',
							'WATERMARK_TEXT' => '',
							'WATERMARK_TEXT_FONT' => '',
							'WATERMARK_TEXT_COLOR' => '',
							'WATERMARK_TEXT_SIZE' => '',
							'WATERMARK_TEXT_POSITION' => 'tl',
							'USE_WATERMARK_FILE' => 'N',
							'WATERMARK_FILE' => '',
							'WATERMARK_FILE_ALPHA' => '',
							'WATERMARK_FILE_POSITION' => 'tl',
							'WATERMARK_FILE_ORDER' => NULL,
						),
				),
			'DETAIL_TEXT_TYPE' =>
				array(
					'NAME' => 'Тип детального описания',
					'IS_REQUIRED' => 'Y',
					'DEFAULT_VALUE' => 'text',
				),
			'DETAIL_TEXT' =>
				array(
					'NAME' => 'Детальное описание',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '',
				),
			'XML_ID' =>
				array(
					'NAME' => 'Внешний код',
					'IS_REQUIRED' => 'Y',
					'DEFAULT_VALUE' => '',
				),
			'CODE' =>
				array(
					'NAME' => 'Символьный код',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' =>
						array(
							'UNIQUE' => 'Y',
							'TRANSLITERATION' => 'Y',
							'TRANS_LEN' => 100,
							'TRANS_CASE' => 'L',
							'TRANS_SPACE' => '-',
							'TRANS_OTHER' => '-',
							'TRANS_EAT' => 'Y',
							'USE_GOOGLE' => 'N',
						),
				),
			'TAGS' =>
				array(
					'NAME' => 'Теги',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '',
				),
			'SECTION_NAME' =>
				array(
					'NAME' => 'Название',
					'IS_REQUIRED' => 'Y',
					'DEFAULT_VALUE' => '',
				),
			'SECTION_PICTURE' =>
				array(
					'NAME' => 'Картинка для анонса',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' =>
						array(
							'FROM_DETAIL' => 'N',
							'SCALE' => 'N',
							'WIDTH' => '',
							'HEIGHT' => '',
							'IGNORE_ERRORS' => 'N',
							'METHOD' => 'resample',
							'COMPRESSION' => 95,
							'DELETE_WITH_DETAIL' => 'N',
							'UPDATE_WITH_DETAIL' => 'N',
							'USE_WATERMARK_TEXT' => 'N',
							'WATERMARK_TEXT' => '',
							'WATERMARK_TEXT_FONT' => '',
							'WATERMARK_TEXT_COLOR' => '',
							'WATERMARK_TEXT_SIZE' => '',
							'WATERMARK_TEXT_POSITION' => 'tl',
							'USE_WATERMARK_FILE' => 'N',
							'WATERMARK_FILE' => '',
							'WATERMARK_FILE_ALPHA' => '',
							'WATERMARK_FILE_POSITION' => 'tl',
							'WATERMARK_FILE_ORDER' => NULL,
						),
				),
			'SECTION_DESCRIPTION_TYPE' =>
				array(
					'NAME' => 'Тип описания',
					'IS_REQUIRED' => 'Y',
					'DEFAULT_VALUE' => 'text',
				),
			'SECTION_DESCRIPTION' =>
				array(
					'NAME' => 'Описание',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '',
				),
			'SECTION_DETAIL_PICTURE' =>
				array(
					'NAME' => 'Детальная картинка',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' =>
						array(
							'SCALE' => 'N',
							'WIDTH' => '',
							'HEIGHT' => '',
							'IGNORE_ERRORS' => 'N',
							'METHOD' => 'resample',
							'COMPRESSION' => 95,
							'USE_WATERMARK_TEXT' => 'N',
							'WATERMARK_TEXT' => '',
							'WATERMARK_TEXT_FONT' => '',
							'WATERMARK_TEXT_COLOR' => '',
							'WATERMARK_TEXT_SIZE' => '',
							'WATERMARK_TEXT_POSITION' => 'tl',
							'USE_WATERMARK_FILE' => 'N',
							'WATERMARK_FILE' => '',
							'WATERMARK_FILE_ALPHA' => '',
							'WATERMARK_FILE_POSITION' => 'tl',
							'WATERMARK_FILE_ORDER' => NULL,
						),
				),
			'SECTION_XML_ID' =>
				array(
					'NAME' => 'Внешний код',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' => '',
				),
			'SECTION_CODE' =>
				array(
					'NAME' => 'Символьный код',
					'IS_REQUIRED' => 'N',
					'DEFAULT_VALUE' =>
						array(
							'UNIQUE' => 'N',
							'TRANSLITERATION' => 'N',
							'TRANS_LEN' => 100,
							'TRANS_CASE' => 'L',
							'TRANS_SPACE' => '-',
							'TRANS_OTHER' => '-',
							'TRANS_EAT' => 'Y',
							'USE_GOOGLE' => 'N',
						),
				),
		));
		$helper->Iblock()->saveProperty($iblockId, array(
			'NAME' => 'Категория',
			'ACTIVE' => 'Y',
			'SORT' => '500',
			'CODE' => 'PRODUCT_CATEGORY',
			'DEFAULT_VALUE' => '',
			'PROPERTY_TYPE' => 'E',
			'ROW_COUNT' => '1',
			'COL_COUNT' => '30',
			'LIST_TYPE' => 'L',
			'MULTIPLE' => 'N',
			'XML_ID' => NULL,
			'FILE_TYPE' => '',
			'MULTIPLE_CNT' => '5',
			'LINK_IBLOCK_ID' => 'content:productcategories',
			'WITH_DESCRIPTION' => 'N',
			'SEARCHABLE' => 'N',
			'FILTRABLE' => 'N',
			'IS_REQUIRED' => 'Y',
			'VERSION' => '1',
			'USER_TYPE' => NULL,
			'USER_TYPE_SETTINGS' => NULL,
			'HINT' => '',
			'FEATURES' =>
				array(
					0 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
					1 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'LIST_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
				),
		));
		$helper->Iblock()->saveProperty($iblockId, array(
			'NAME' => 'Тип заявки',
			'ACTIVE' => 'Y',
			'SORT' => '500',
			'CODE' => 'REQUEST_TYPE',
			'DEFAULT_VALUE' => '',
			'PROPERTY_TYPE' => 'L',
			'ROW_COUNT' => '1',
			'COL_COUNT' => '30',
			'LIST_TYPE' => 'L',
			'MULTIPLE' => 'N',
			'XML_ID' => NULL,
			'FILE_TYPE' => '',
			'MULTIPLE_CNT' => '5',
			'LINK_IBLOCK_ID' => '0',
			'WITH_DESCRIPTION' => 'N',
			'SEARCHABLE' => 'N',
			'FILTRABLE' => 'N',
			'IS_REQUIRED' => 'Y',
			'VERSION' => '1',
			'USER_TYPE' => NULL,
			'USER_TYPE_SETTINGS' => NULL,
			'HINT' => '',
			'VALUES' =>
				array(
					0 =>
						array(
							'VALUE' => 'Запрос цены и сроков поставки',
							'DEF' => 'N',
							'SORT' => '100',
							'XML_ID' => 'price_request',
						),
					1 =>
						array(
							'VALUE' => 'Пополнение складов',
							'DEF' => 'N',
							'SORT' => '200',
							'XML_ID' => 'warehouses_replenishment',
						),
					2 =>
						array(
							'VALUE' => 'Спецзаявка',
							'DEF' => 'N',
							'SORT' => '300',
							'XML_ID' => 'special_request',
						),
				),
			'FEATURES' =>
				array(
					0 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
					1 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'LIST_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
				),
		));
		$helper->Iblock()->saveProperty($iblockId, array(
			'NAME' => 'Склад оставки',
			'ACTIVE' => 'Y',
			'SORT' => '500',
			'CODE' => 'SUPPLY_WAREHOUSE',
			'DEFAULT_VALUE' => '',
			'PROPERTY_TYPE' => 'E',
			'ROW_COUNT' => '1',
			'COL_COUNT' => '30',
			'LIST_TYPE' => 'L',
			'MULTIPLE' => 'N',
			'XML_ID' => NULL,
			'FILE_TYPE' => '',
			'MULTIPLE_CNT' => '5',
			'LINK_IBLOCK_ID' => 'content:supplywarehouses',
			'WITH_DESCRIPTION' => 'N',
			'SEARCHABLE' => 'N',
			'FILTRABLE' => 'N',
			'IS_REQUIRED' => 'N',
			'VERSION' => '1',
			'USER_TYPE' => NULL,
			'USER_TYPE_SETTINGS' => NULL,
			'HINT' => '',
			'FEATURES' =>
				array(
					0 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
					1 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'LIST_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
				),
		));
		$helper->Iblock()->saveProperty($iblockId, array(
			'NAME' => 'Прикрепленный файл',
			'ACTIVE' => 'Y',
			'SORT' => '500',
			'CODE' => 'FILE',
			'DEFAULT_VALUE' => '',
			'PROPERTY_TYPE' => 'F',
			'ROW_COUNT' => '1',
			'COL_COUNT' => '30',
			'LIST_TYPE' => 'L',
			'MULTIPLE' => 'N',
			'XML_ID' => NULL,
			'FILE_TYPE' => '',
			'MULTIPLE_CNT' => '5',
			'LINK_IBLOCK_ID' => '0',
			'WITH_DESCRIPTION' => 'N',
			'SEARCHABLE' => 'N',
			'FILTRABLE' => 'N',
			'IS_REQUIRED' => 'N',
			'VERSION' => '1',
			'USER_TYPE' => NULL,
			'USER_TYPE_SETTINGS' => NULL,
			'HINT' => '',
			'FEATURES' =>
				array(
					0 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
					1 =>
						array(
							'MODULE_ID' => 'iblock',
							'FEATURE_ID' => 'LIST_PAGE_SHOW',
							'IS_ENABLED' => 'N',
						),
				),
		));

	}

	public function down()
	{
		$helper = $this->getHelperManager();
		$helper->Iblock()->deleteIblockIfExists('requestform');
	}
}
