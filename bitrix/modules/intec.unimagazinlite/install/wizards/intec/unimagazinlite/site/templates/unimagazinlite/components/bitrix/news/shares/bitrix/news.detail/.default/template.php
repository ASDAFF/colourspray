<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?$GLOBALS["arrFilterStock"] = array( "!ID" => $arResult["ID"] )?>	
<div class="share"> 	 		
	<?if( is_array( $arResult["DETAIL_PICTURE"] ) ){?>
        <?$picture = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array( "width" => 1240, "height" => 1240 ), BX_RESIZE_IMAGE_PROPORTIONAL );?>
        <div class="image">
            <img src="<?=$picture['src']?>" />
            <?if ($arResult['PROPERTIES']['IMAGE_TEXT_LOCATION']['VALUE_XML_ID'] == 'LEFT' || $arResult['PROPERTIES']['IMAGE_TEXT_LOCATION']['VALUE_XML_ID'] == 'RIGHT'):?>
                <div class="text <?=$arResult['PROPERTIES']['IMAGE_TEXT_LOCATION']['VALUE_XML_ID'] == 'LEFT'?'location-left':'location-right'?>"
                    style="
                        <?=!empty($arResult['PROPERTIES']['IMAGE_TEXT_COLOR']['VALUE'])?'color: '.$arResult['PROPERTIES']['IMAGE_TEXT_COLOR']['VALUE'].';':''?>
                        <?=!empty($arResult['PROPERTIES']['IMAGE_TEXT_BACKGROUND_COLOR']['VALUE'])?'background: '.$arResult['PROPERTIES']['IMAGE_TEXT_BACKGROUND_COLOR']['VALUE'].';':''?>
                        <?=!empty($arResult['PROPERTIES']['IMAGE_TEXT_PADDING']['VALUE'])?'padding-left: '.$arResult['PROPERTIES']['IMAGE_TEXT_PADDING']['VALUE'].';':''?>
                        <?=!empty($arResult['PROPERTIES']['IMAGE_TEXT_PADDING']['VALUE'])?'padding-right: '.$arResult['PROPERTIES']['IMAGE_TEXT_PADDING']['VALUE'].';':''?>
                    "
                >
                    <div class="uni-aligner-vertical"></div>
                    <div class="text-wrapper">
                        <?=$arResult['PROPERTIES']['IMAGE_TEXT']['~VALUE']['TEXT']?>
                    </div>
                </div>
            <?endif;?>
        </div>	
	<?}?>
    <div class="uni-indents-vertical indent-35"></div>
	<div class="description uni-text-default"> 
		<?=$arResult["DETAIL_TEXT"]?> 	
	</div>
	<div class="clear"></div>
    <?if (!empty($arResult['DATE_ACTIVE_FROM']) || !empty($arResult['DATE_ACTIVE_TO'])):?>
        <div class="uni-indents-vertical indent-35"></div>
        <div class="date">
            <?if (!empty($arResult['DATE_ACTIVE_FROM'])):?>
                <?if (!empty($arResult['DATE_ACTIVE_TO'])):?>
                    <?=GetMessage('PERIOD_FROM_1')?> <?=$arResult['DATE_ACTIVE_FROM']?> <?=GetMessage('PERIOD_TO')?> <?=$arResult['DATE_ACTIVE_TO']?>
                <?else:?>
                    <?=GetMessage('PERIOD_FROM_2')?> <?=$arResult['DATE_ACTIVE_FROM']?>
                <?endif;?>
            <?else:?>
                <?=GetMessage('PERIOD_FROM_3')?> <?=$arResult['DATE_ACTIVE_TO']?>
            <?endif;?>
        </div>
    <?endif;?>
	<?if(is_array($arResult["PROPERTIES"]["LINK"]["VALUE"])){?>
        <div class="uni-indents-vertical indent-40"></div>
		<h3 class="header_grey"><?=GetMessage("ALSO_LOOK")?></h3>
		<?$GLOBALS["arrFilter"] = array("ID" => $arResult["PROPERTIES"]["LINK"]["VALUE"]);?> 		 	
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
				"PAGE_ELEMENT_COUNT" => "8",
				"LINE_ELEMENT_COUNT" => "4",
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
				"OFFERS_CART_PROPERTIES" => array(),
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N"
			),
			$component
		);?> 	
	<?}?>
    <div class="uni-indents-vertical indent-35"></div>
    <a href="<?=$arResult['IBLOCK']['LIST_PAGE_URL']?>"><?=GetMessage('GO_BACK')?></a>
</div>
<div class="clear"></div>
