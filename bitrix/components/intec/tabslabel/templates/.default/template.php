<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="tabs_block">
	<div id="tabs_block">
		<ul class="clearfix nav">
			<?if($arParams["ENABLE_STOCK"]){?>
				<li>
					<a href="#tabs-1">
						<?=GetMessage("MESS_STOCK");?>
					</a>
				</li>
			<?}?>
			<?if($arParams["ENABLE_HIT"]){?>
				<li>
					<a href="#tabs-2">
						<?=GetMessage("MESS_HIT");?>
					</a>
				</li>
			<?}?>
			<?if($arParams["ENABLE_NEWS"]){?>
				<li>
					<a href="#tabs-3">
						<?=GetMessage("MESS_NEW");?>
					</a>
				</li>
			<?}?>
			<?if($arParams["ENABLE_RECOMMEND"]){?>
				<li>
					<a href="#tabs-4">
						<?=GetMessage("MESS_RECOMMEND");?>
					</a>
				</li>
			<?}?>			
		</ul>		
		<?if($arParams["ENABLE_STOCK"]){?>
			<div id="tabs-1">
				<?$GLOBALS["arrStockFilter"] = array("!PROPERTY_STOCK" => false); ?>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.top", "uni_popular", array(
					"IBLOCK_TYPE" =>  $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_SORT_FIELD" => "RAND",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER2" => "desc",
					"FILTER_NAME" => "arrStockFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"ELEMENT_COUNT" => "8",
					"LINE_ELEMENT_COUNT" => "4",
					"PROPERTY_CODE" => array(
						0 => "HIT",
						1 => "NEW",
						2 => "STOCK",
						3 => "RECOMMEND",
						4 => "",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_PROPERTY_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFERS_LIMIT" => "6",
					"SECTION_URL" => "catalog/#SECTION_ID#/",
					"DETAIL_URL" => "catalog/#SECTION_ID#/#ELEMENT_ID#/",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"DISPLAY_COMPARE" => "N",
					"CACHE_FILTER" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"BASKET_URL" => "/personal/basket.php",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => array(
						0 => "HIT",
						1 => "NEW",
						2 => "STOCK",
						3 => "RECOMMEND"
					),
					"OFFERS_CART_PROPERTIES" => array(
					),
					"PRODUCT_QUANTITY_VARIABLE" => "quantity"
					),
					false
				);?>
			</div>
		<?}?>
		<?if($arParams["ENABLE_HIT"]){?>
			<div id="tabs-2">
				<?$GLOBALS["arrHitFilter"] = array("!PROPERTY_HIT" => false); ?>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.top", "uni_popular", array(
					"IBLOCK_TYPE" =>  $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_SORT_FIELD" => "RAND",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER2" => "desc",
					"FILTER_NAME" => "arrHitFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"ELEMENT_COUNT" => "8",
					"LINE_ELEMENT_COUNT" => "4",
					"PROPERTY_CODE" => array(
						0 => "HIT",
						1 => "NEW",
						2 => "STOCK",
						3 => "RECOMMEND",
						4 => "",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_PROPERTY_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFERS_LIMIT" => "6",
					"SECTION_URL" => "catalog/#SECTION_ID#/",
					"DETAIL_URL" => "catalog/#SECTION_ID#/#ELEMENT_ID#/",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"DISPLAY_COMPARE" => "N",
					"CACHE_FILTER" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"BASKET_URL" => "/personal/basket.php",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => array(
						0 => "HIT",
						1 => "NEW",
						2 => "STOCK",
						3 => "RECOMMEND"
					),
					"OFFERS_CART_PROPERTIES" => array(
					),
					"PRODUCT_QUANTITY_VARIABLE" => "quantity"
					),
					false
				);?>
			</div>
		<?}?>
		<?if($arParams["ENABLE_NEWS"]){?>
			<div id="tabs-3">
				<?$GLOBALS["arrNewFilter"] = array("!PROPERTY_NEW" => false);?>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.top", "uni_popular", array(
					"IBLOCK_TYPE" =>  $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_SORT_FIELD" => "RAND",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER2" => "desc",
					"FILTER_NAME" => "arrNewFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"ELEMENT_COUNT" => "8",
					"LINE_ELEMENT_COUNT" => "4",
					"PROPERTY_CODE" => array(
						0 => "HIT",
						1 => "NEW",
						2 => "STOCK",
						3 => "RECOMMEND",
						4 => "",
					),
					"OFFERS_FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_PROPERTY_CODE" => array(
						0 => "",
						1 => "",
					),
					"OFFERS_SORT_FIELD" => "sort",
					"OFFERS_SORT_ORDER" => "asc",
					"OFFERS_SORT_FIELD2" => "id",
					"OFFERS_SORT_ORDER2" => "desc",
					"OFFERS_LIMIT" => "6",
					"SECTION_URL" => "catalog/#SECTION_ID#/",
					"DETAIL_URL" => "catalog/#SECTION_ID#/#ELEMENT_ID#/",
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"DISPLAY_COMPARE" => "N",
					"CACHE_FILTER" => "N",
					"PRICE_CODE" => array(
						0 => "BASE",
					),
					"USE_PRICE_COUNT" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"PRICE_VAT_INCLUDE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"BASKET_URL" => "/personal/basket.php",
					"ACTION_VARIABLE" => "action",
					"PRODUCT_ID_VARIABLE" => "id",
					"USE_PRODUCT_QUANTITY" => "N",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRODUCT_PROPERTIES" => array(
						0 => "HIT",
						1 => "NEW",
						2 => "STOCK",
						3 => "RECOMMEND"
					),
					"OFFERS_CART_PROPERTIES" => array(
					),
					"PRODUCT_QUANTITY_VARIABLE" => "quantity"
					),
					false
				);?>
			</div>
		<?}?>
		<?if($arParams["ENABLE_RECOMMEND"]){?>
			<div id="tabs-4">
				<?$GLOBALS["arrRecFilter"] = array("!PROPERTY_RECOMMEND" => false); ?>
				<?$APPLICATION->IncludeComponent("bitrix:catalog.top", "uni_popular_slider", Array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],	// Тип инфоблока
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],	// Инфоблок
		"ELEMENT_SORT_FIELD" => "RAND",	// По какому полю сортируем элементы
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
		"FILTER_NAME" => "arrRecFilter",	// Имя массива со значениями фильтра для фильтрации элементов
		"HIDE_NOT_AVAILABLE" => "N",	// Не отображать товары, которых нет на складах
		"ELEMENT_COUNT" => "8",	// Количество выводимых элементов
		"LINE_ELEMENT_COUNT" => "4",	// Количество элементов выводимых в одной строке таблицы
		"PROPERTY_CODE" => array(	// Свойства
			0 => "HIT",
			1 => "NEW",
			2 => "STOCK",
			3 => "RECOMMEND",
			4 => "",
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFERS_LIMIT" => "6",	// Максимальное количество предложений для показа (0 - все)
		"SECTION_URL" => "catalog/#SECTION_ID#/",	// URL, ведущий на страницу с содержимым раздела
		"DETAIL_URL" => "catalog/#SECTION_ID#/#ELEMENT_ID#/",	// URL, ведущий на страницу с содержимым элемента раздела
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"PRICE_CODE" => array(	// Тип цены
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
		"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
		"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRODUCT_PROPERTIES" => array(	// Характеристики товара
			0 => "HIT",
			1 => "NEW",
			2 => "STOCK",
			3 => "RECOMMEND",
		),
		"OFFERS_CART_PROPERTIES" => "",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
	),
	false
);?>
			</div>
		<?}?>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#tabs_block").tabs();
})
</script>