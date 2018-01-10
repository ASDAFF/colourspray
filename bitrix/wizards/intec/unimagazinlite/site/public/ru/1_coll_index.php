<div class="uni-indents-vertical indent-40"></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"popular_category", 
	array(
		"IBLOCK_TYPE" => "#CATEGORIES_POPULAR_IBLOCK_TYPE#",
		"IBLOCK_ID" => "#CATEGORIES_POPULAR_IBLOCK_ID#",
		"NEWS_COUNT" => "6",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "TARGET",
			1 => "SIZE_BLOCK",
			2 => "HREF",
			3 => "",
		),
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "100",
		"ACTIVE_DATE_FORMAT" => "",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "N",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"TEXT_TITLE" => "",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "popular_category",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"GRID_SIZE" => "4"
	),
	$component
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"tizers", 
	array(
		"IBLOCK_TYPE" => "#BANNERS_IBLOCK_TYPE#",
		"IBLOCK_ID" => "#BANNERS_IBLOCK_ID#",
		"NEWS_COUNT" => "4",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "BANNER_TEXT",
			1 => "LINK",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION_CODE" => "tizers",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Баннеры",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
		"PAGER_SHOW_ALL" => "N",
		"TEXT_BANNERS" => "Популярные категории",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SIZE" => "big",
		"COMPONENT_TEMPLATE" => "tizers",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"LINE_ELEMENT_COUNT" => "4"
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"intec:tabslabel", 
	"tabsblock", 
	array(
		"COMPONENT_TEMPLATE" => "tabsblock",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_CLOSE_POPUP" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
		"ENABLE_HIT" => "Y",
		"ENABLE_RECOMMEND" => "Y",
		"ENABLE_NEWS" => "Y",
		"ENABLE_STOCK" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"DISPLAY_COMPARE" => "Y",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"LINE_ELEMENT_COUNT" => "4",
		"ELEMENT_COUNT" => "10",
		"CURRENCY" => "rub",
		"COMPARE_PATH" => "",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		'USE_GREY_BGN' => 'Y'
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"four_banners", 
	array(
		"IBLOCK_TYPE" => "#BANNERS_IBLOCK_TYPE#",
		"IBLOCK_ID" => "#BANNERS_IBLOCK_ID#",
		"NEWS_COUNT" => "4",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "BANNER_TEXT",
			1 => "LINK",
			2 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "85",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION_CODE" => "four_banners",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Баннеры",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "3600",
		"PAGER_SHOW_ALL" => "N",
		"TEXT_BANNERS" => "Лучшие акции",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "four_banners",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"LINE_ELEMENT_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
<?$arFilter1 = array("PROPERTY_SHOW_ON_MAIN_VALUE" => "Y");?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"services_on_main_2", 
	array(
		"IBLOCK_TYPE" => "#SERVICES_IBLOCK_TYPE#",
		"IBLOCK_ID" => "#SERVICES_IBLOCK_ID#",
		"NEWS_COUNT" => "3",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arFilter1",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "autor",
			2 => "company",
			3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "103",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "services_big",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"NAME" => "Услуги",
		"LINE_ELEMENT_COUNT" => "3",
		'USE_GREY_BGN' => 'Y'
	),
	false
);?>	
	<?$APPLICATION->IncludeComponent(
		"bitrix:news.list", 
		"reviews", 
		array(
			"IBLOCK_TYPE" => "#REVIEWS_IBLOCK_TYPE#",
			"IBLOCK_ID" => "#REVIEWS_IBLOCK_ID#",
			"NEWS_COUNT" => "3",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_ORDER1" => "DESC",
			"SORT_BY2" => "SORT",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "autor",
				1 => "company",
				2 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
			"PREVIEW_TRUNCATE_LEN" => "103",
			"ACTIVE_DATE_FORMAT" => "j F Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"INCLUDE_SUBSECTIONS" => "Y",
			"PAGER_TEMPLATE" => "",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"COMPONENT_TEMPLATE" => "reviews",
			"SET_BROWSER_TITLE" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_META_DESCRIPTION" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"SHOW_404" => "N",
			"MESSAGE_404" => ""
		),
		false
	);?>	
	<div class="uni_parent_col">
		<div class="about-company uni-66 uni_col">			
			<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array("AREA_FILE_SHOW" => "file","PATH" => SITE_DIR."include/front_info.php","EDIT_TEMPLATE" => ""));?>
		</div>
		<div class="about-company uni-33 uni_col">
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "news_on_main_picture", Array(
				"IBLOCK_TYPE" => "#NEWS_IBLOCK_TYPE#",	// Тип информационного блока (используется только для проверки)
					"IBLOCK_ID" => "#NEWS_IBLOCK_ID#",	// Код информационного блока
					"NEWS_COUNT" => "3",	// Количество новостей на странице
					"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
					"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
					"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
					"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					"FILTER_NAME" => "",	// Фильтр
					"FIELD_CODE" => array(	// Поля
						0 => "DATE_CREATE",
						1 => "",
					),
					"PROPERTY_CODE" => array(	// Свойства
						0 => "",
						1 => "",
					),
					"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
					"CACHE_GROUPS" => "N",	// Учитывать права доступа
					"PREVIEW_TRUNCATE_LEN" => "110",	// Максимальная длина анонса для вывода (только для типа текст)
					"ACTIVE_DATE_FORMAT" => "j M Y",	// Формат показа даты
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
					"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
					"PARENT_SECTION" => "",	// ID раздела
					"PARENT_SECTION_CODE" => "",	// Код раздела
					"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
					"PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
					"PAGER_TITLE" => "Новости",	// Название категорий
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"DISPLAY_DATE" => "Y",	// Выводить дату элемента
					"DISPLAY_NAME" => "Y",	// Выводить название элемента
					"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
				),
				false
			);?>
		</div>
	</div>
	<?session_start();?>
    <?if (is_array($_SESSION["VIEWED_PRODUCTS"]) && count($_SESSION["VIEWED_PRODUCTS"]) > 0):?>
        <?$GLOBALS["arrFilter"] = array("ID" => $_SESSION["VIEWED_PRODUCTS"])?> 		 	
		<?$APPLICATION->IncludeComponent(
        	"bitrix:catalog.section", 
        	"slider", 
        	array(
        		"AJAX_MODE" => "N",
        		"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
        		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
        		"SECTION_ID" => "",
        		"SECTION_CODE" => "",
        		"SECTION_USER_FIELDS" => array(
        			0 => "",
        			1 => "",
        		),
        		"ELEMENT_SORT_FIELD" => "sort",
        		"ELEMENT_SORT_ORDER" => "asc",
        		"FILTER_NAME" => "arrFilter",
        		"FLEXISEL_ID" => "accompanyingList",
        		"INCLUDE_SUBSECTIONS" => "Y",
        		"TITLE" => "Вы смотрели",
        		"SHOW_ALL_WO_SECTION" => "Y",
        		"SECTION_URL" => "",
        		"DETAIL_URL" => "",
        		"BASKET_URL" => SITE_DIR."cart/",
        		"ACTION_VARIABLE" => "action",
        		"PRODUCT_ID_VARIABLE" => "id",
        		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
        		"PRODUCT_PROPS_VARIABLE" => "prop",
        		"SECTION_ID_VARIABLE" => "SECTION_ID",
        		"META_KEYWORDS" => "-",
        		"META_DESCRIPTION" => "-",
        		"BROWSER_TITLE" => "-",
        		"ADD_SECTIONS_CHAIN" => "N",
        		"DISPLAY_COMPARE" => "N",
        		"SET_TITLE" => "N",
        		"SET_STATUS_404" => "N",
        		"PAGE_ELEMENT_COUNT" => "10",
        		"LINE_ELEMENT_COUNT" => "6",
        		"PROPERTY_CODE" => array(
        			0 => "",
        			1 => "",
        		),
        		"OFFERS_FIELD_CODE" => "ID",
        		"OFFERS_PROPERTY_CODE" => "",
        		"OFFERS_SORT_FIELD" => "sort",
        		"OFFERS_SORT_ORDER" => "asc",
        		"OFFERS_LIMIT" => "2",
        		"PRICE_CODE" => array(
        		),
        		"USE_PRICE_COUNT" => "N",
        		"SHOW_PRICE_COUNT" => "1",
        		"PRICE_VAT_INCLUDE" => "Y",
        		"USE_PRODUCT_QUANTITY" => "N",
        		"CACHE_TYPE" => "A",
        		"CACHE_TIME" => "36000000",
        		"CACHE_FILTER" => "N",
        		"CACHE_GROUPS" => "Y",
        		"DISPLAY_TOP_PAGER" => "N",
        		"DISPLAY_BOTTOM_PAGER" => "N",
        		"PAGER_TITLE" => "",
        		"PAGER_SHOW_ALWAYS" => "N",
        		"PAGER_TEMPLATE" => "shop",
        		"PAGER_DESC_NUMBERING" => "N",
        		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        		"PAGER_SHOW_ALL" => "N",
        		"CONVERT_CURRENCY" => "N",
        		"OFFERS_CART_PROPERTIES" => "",
        		"AJAX_OPTION_JUMP" => "N",
        		"AJAX_OPTION_STYLE" => "Y",
        		"AJAX_OPTION_HISTORY" => "N",
        		"CURRENCY" => "",
        		"COMPONENT_TEMPLATE" => "slider",
        		"ELEMENT_SORT_FIELD2" => "id",
        		"ELEMENT_SORT_ORDER2" => "desc",
        		"BACKGROUND_IMAGE" => "-",
        		"SEF_MODE" => "N",
        		"AJAX_OPTION_ADDITIONAL" => "",
        		"SET_BROWSER_TITLE" => "Y",
        		"SET_META_KEYWORDS" => "Y",
        		"SET_META_DESCRIPTION" => "Y",
        		"SET_LAST_MODIFIED" => "N",
        		"USE_MAIN_ELEMENT_SECTION" => "N",
        		"ADD_PROPERTIES_TO_BASKET" => "Y",
        		"PARTIAL_PRODUCT_PROPERTIES" => "N",
        		"PRODUCT_PROPERTIES" => array(
        			0 => "CML2_ACCESORIES",
        			1 => "CML2_NEW",
        			2 => "CML2_RECOMEND",
        			3 => "CML2_ACCOMPANYING",
        			4 => "CML2_HIT",
        		),
        		"PAGER_BASE_LINK_ENABLE" => "N",
        		"SHOW_404" => "N",
        		"MESSAGE_404" => "",
        		"DISABLE_INIT_JS_IN_COMPONENT" => "N"
        	),
        	false,
			array(
			"ACTIVE_COMPONENT" => "N"
			)
        );?>
    <?endif;?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "slider_lider_brand", array(
	"IBLOCK_TYPE" => "#BRANDS_IBLOCK_TYPE#",
	"IBLOCK_ID" => "#BRANDS_IBLOCK_ID#",
	"SECTION_ID" => "",
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD2" => "id",
	"ELEMENT_SORT_ORDER2" => "desc",
	"FILTER_NAME" => "",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"HIDE_NOT_AVAILABLE" => "N",
	"PAGE_ELEMENT_COUNT" => "20",
	"LINE_ELEMENT_COUNT" => "10",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"SECTION_ID_VARIABLE" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_GROUPS" => "N",
	"SET_META_KEYWORDS" => "Y",
	"META_KEYWORDS" => "-",
	"SET_META_DESCRIPTION" => "Y",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "",
	"PRICE_VAT_INCLUDE" => "Y",
	"CONVERT_CURRENCY" => "N",
	"BASKET_URL" => SITE_DIR."cart/",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"USE_PRODUCT_QUANTITY" => "N",
	"ADD_PROPERTIES_TO_BASKET" => "Y",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"PARTIAL_PRODUCT_PROPERTIES" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"PAGER_TEMPLATE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>