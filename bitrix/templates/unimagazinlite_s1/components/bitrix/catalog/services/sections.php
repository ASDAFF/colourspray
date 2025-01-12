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
global $options;

if (strlen($options["SERVICES_CATALOG_DEFAULT_VIEW"]["ACTIVE_VALUE"]) > 0)
{
	$view = $options["SERVICES_CATALOG_DEFAULT_VIEW"]["ACTIVE_VALUE"];
}
else
{
	$view = $options["SERVICES_CATALOG_DEFAULT_VIEW"]["DEFAULT_VALUE"];
}

switch ($_COOKIE['SERVICES_CATALOG_VIEW'])
{
	case 'LIST' : $view = $_COOKIE['SERVICES_CATALOG_VIEW']; break;
	case 'TILE' : $view = $_COOKIE['SERVICES_CATALOG_VIEW']; break;
	case 'TEXT' : $view = $_COOKIE['SERVICES_CATALOG_VIEW']; break;
}

switch ($_GET['view'])
{
	case 'LIST' : $view = $_GET['view']; break;
	case 'TILE' : $view = $_GET['view']; break;
	case 'TEXT' : $view = $_GET['view']; break;
}

$arSectionViews = array(
    'LIST' => 'list',
    'TEXT' => 'extend',
    'TILE' => 'tile'
);

$iSectionsCount = 0;
$iElementsCount = 0;

if (CModule::IncludeModule('iblock'))
{
    $iElementsCount = CIBlockElement::GetList(array(), array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_ID" => false,
        "ACTIVE" => "Y"
    ), array());
    
    $iSectionsCount = CIBlockSection::GetCount(array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "SECTION_ID" => false,
        "ACTIVE" => "Y"
    ));
}

$arFlags = array(
    'SHOW_SECTIONS' => $iSectionsCount > 0 ? true : false,
    'SHOW_ELEMENTS' => $iElementsCount > 0 ? true : false
);

setcookie('SERVICES_CATALOG_VIEW', $view);

?>
<?if ($arFlags['SHOW_SECTIONS']):?>
    <div class="left_col"><?$APPLICATION->IncludeComponent(
    	"bitrix:catalog.section.list",
    	"",
    	array(
    		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
    		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
    		"CACHE_TIME" => $arParams["CACHE_TIME"],
    		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
    		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
    		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
    		"VIEW_MODE" => "MENU",
    		"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
    		"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
    		"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
    	),
    	$component,
    	array("HIDE_ICONS" => "Y")
    );
    ?>
    </div>
    <div class="right_col clearfix">
<?endif;?>
<?if ($arFlags['SHOW_ELEMENTS']):?>
	<div class="uni-panel-sort">
		<div class="view">
            <div class="uni-aligner-vertical"></div>
			<div class="caption"><?//=GetMessage("SECTION_SORT_TITLE_VIEW")?></div>
            <div class="views">
				<a rel="nofollow" href="<?=$APPLICATION->GetCurPageParam('view=TEXT',array('view'),false)?>" class="text<?=($view=="TEXT"?' ui-state-active':'')?>"></a>
				<a rel="nofollow" href="<?=$APPLICATION->GetCurPageParam('view=LIST',array('view'),false)?>" class="list<?=($view=="LIST"?' ui-state-active':'')?>"></a>
				<a rel="nofollow" href="<?=$APPLICATION->GetCurPageParam('view=TILE',array('view'),false)?>" class="tile<?=($view=="TILE"?' ui-state-active':'')?>"></a>
            </div>
        </div>	
	</div>
    <div class="uni-indents-vertical" style="padding-bottom: 16px;"></div>
<?endif;?>
<?if (!$arFlags['SHOW_ELEMENTS'] || $arFlags['SHOW_SECTIONS']):?>
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
			"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"VIEW_MODE" => $view,
			"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
			"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
			"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
            "LINE_SECTION_COUNT" => $arParams["LINE_SECTION_COUNT"]
		),
		$component
	);?>
<?endif;?>
<?if ($arFlags['SHOW_SECTIONS'] && $arFlags['SHOW_ELEMENTS']):?>
    <div class="uni-indents-vertical indent-25"></div>
<?endif;?>
<?if ($arFlags['SHOW_ELEMENTS']):?>
    <?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		$arSectionViews[$view],
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
			"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
			"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
			"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
			"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
			"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
			"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
			"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
			"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
			"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
			"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_FILTER" => $arParams["CACHE_FILTER"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"SET_TITLE" => $arParams["SET_TITLE"],
			"MESSAGE_404" => $arParams["MESSAGE_404"],
			"SET_STATUS_404" => $arParams["SET_STATUS_404"],
			"SHOW_404" => $arParams["SHOW_404"],
			"FILE_404" => $arParams["FILE_404"],
			"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
			"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
			"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
			"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
			"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
			"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

			"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
			"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
			"PAGER_TITLE" => $arParams["PAGER_TITLE"],
			"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
			"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
			"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
			"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
			"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
			"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
			"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

			"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
			"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
			"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
			"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
			"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
			"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
			"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
			"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
			"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
			"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
			'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
			'CURRENCY_ID' => $arParams['CURRENCY_ID'],
			'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

			'LABEL_PROP' => $arParams['LABEL_PROP'],
			'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
			'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

			'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
			'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
			'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
			'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
			'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
			'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
			'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
			'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
			'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
			'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

			'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
			"ADD_SECTIONS_CHAIN" => "N",
			'ADD_TO_BASKET_ACTION' => $basketAction,
			'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
			'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
			'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : '')
		),
		$component
	);?>
<?endif;?>
<?if ($arFlags['SHOW_SECTIONS']):?>
    </div>
<?endif;?>
<div class="clear"></div>