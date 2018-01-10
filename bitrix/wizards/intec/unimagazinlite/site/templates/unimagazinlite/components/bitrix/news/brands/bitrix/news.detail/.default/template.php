<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>

<div class="bx_news_detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && !empty($arResult["DETAIL_PICTURE"])):?>
        <div class="image">
            <div class="uni-aligner-vertical"></div>
            <img class="detail_picture" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" title="<?=$arResult["NAME"]?>" />
        </div>
	<?endif?>
    <div class="description uni-text-default">
	  <?=$arResult["DETAIL_TEXT"];?>
    </div>
</div>
<?$productsCount = CIBlockElement::GetList(array(), array("PROPERTY_CML2_BRAND" => $arResult["ID"]), array())?>
<?if ($productsCount > 0):?>
	<div class="uni-indents-vertical indent-35"></div>
	<h3 class="header_grey"><?=GetMessage('BRAND_PRODUCTS')?></h3>
	<?$GLOBALS["arrFilter"] = array("PROPERTY_CML2_BRAND" => $arResult["ID"]);?> 		 	
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"tile",
		Array(
			"AJAX_MODE" => "N",
			"IBLOCK_TYPE" => $arParams["IBLOCK_CATALOG_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_CATALOG_ID"],
			"SECTION_ID" => "",
			"SECTION_CODE" => "",
			"SECTION_USER_FIELDS" => array(),
			"ELEMENT_SORT_FIELD" => "sort",
			"ELEMENT_SORT_ORDER" => "asc",
			"FILTER_NAME" => "arrFilter",
			"INCLUDE_SUBSECTIONS" => "Y",
			"SHOW_ALL_WO_SECTION" => "Y",
			"SECTION_URL" => "",
			"DETAIL_URL" => "",
			"BASKET_URL" => "/personal/cart/",
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
			"PAGE_ELEMENT_COUNT" => "12",
			"LINE_ELEMENT_COUNT" => "3",
			"PROPERTY_CODE" => array(0=>"HIT",1=>"RECOMMEND",2=>"NEW",3=>"",),
			"OFFERS_FIELD_CODE" => array("ID"),
			"OFFERS_PROPERTY_CODE" => array(),
			"OFFERS_SORT_FIELD" => "sort",
			"OFFERS_SORT_ORDER" => "asc",
			"OFFERS_LIMIT" => "2",
			"PRICE_CODE" => array(0=>"BASE"),
			"USE_PRICE_COUNT" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"PRICE_VAT_INCLUDE" => "Y",
			"USE_PRODUCT_QUANTITY" => "N",
			"CACHE_TYPE" => "N",
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
			"OFFERS_CART_PROPERTIES" => array(),
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N"
		)
	);?>
<?endif;?>