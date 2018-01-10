<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="stock">
<?$GLOBALS["arrFilterStock"] = array( "!ID" => $arResult["ID"] )?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"stock_detail_left_block",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "capital_content",
		"IBLOCK_ID" => $arResult["IBLOCK_ID"],
		"NEWS_COUNT" => "4",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilterStock",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("PERIOD"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	),
false
);?>
  
 
  <div class="stock_detail"> 	 
    <div class="also_availible_stock"> 		 </div>
   	 
    <div class="stock_detail_right"> 		
	<?if( is_array( $arResult["DETAIL_PICTURE"] ) ){?> 			 
      <div class="fancy_picture"> <span class="stock_png"></span><a class="fancy hideipad hidephone" rel="stock_gallery" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" >			 					<img border="0" src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>"  /> 				</a> 			</div>
     		<?}?> 
		
      <div class="text"> 			 
        <h4><?=$arResult['NAME'];?></h4>
       			<?if( $arResult["PROPERTIES"]["PERIOD"]["VALUE"] ){?> 					 
        <div class="period"><?=$arResult["PROPERTIES"]["PERIOD"]["VALUE"]?></div>
       
        <br />
       				 			<?}?> 			<?=$arResult["DETAIL_TEXT"]?> 		</div>
     		 
      <div style="clear: both;"></div>
     		 
      <h4><?=GetMessage("ALSO_LOOK")?></h4>
    <?$GLOBALS["arrFilter"] = array( "ID" => $arResult["PROPERTIES"]["LINK"]["VALUE"] )?> 		 	
	<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"shop_table_preview",
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
		"BASKET_URL" => "/basket/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"ADD_SECTIONS_CHAIN" => "N",
		"DISPLAY_COMPARE" => "Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"PAGE_ELEMENT_COUNT" => "4",
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
		"PAGER_TITLE" => "Товары",
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
);?> 	</div>
   </div>
</div>


