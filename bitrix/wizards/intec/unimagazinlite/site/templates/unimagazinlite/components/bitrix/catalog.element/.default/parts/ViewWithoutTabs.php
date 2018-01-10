<?if ($arFlags['SHOW_DESCRIPTION']):?>
	<div class="startshop-indents-vertical indent-50"></div>
    <div class="startshop-row">
		<div class="startshop-title"><?=GetMessage('PRODUCT_DESCRIPTION')?></div>
        <div class="startshop-indents-vertical indent-25"></div>
		<div id="description" class="startshop-item_description startshop-text-default">
			<?=$arResult['DETAIL_TEXT']?>
		</div>
		<div class="clear"></div>
	</div>
<?endif;?>
<?if ($arFlags['SHOW_PROPERTIES']):?>
	<div class="startshop-indents-vertical indent-50"></div>
	<div class="startshop-row">
		<div class="startshop-title"><?=GetMessage('PRODUCT_PROPERTIES')?></div>
		<div class="startshop-indents-vertical indent-25"></div>
		<div id="properties" class="startshop-item_description">
			<div class="startshop-properties">
				<?foreach ($properties as $property):?>
					<div class="startshop-property">
						<div class="startshop-name">
							<?=$property['NAME']?>
						</div>
						<div class="startshop-value">
                            <?if (!is_array($property['VALUE'])):?>
						 	    <?=$property['VALUE']?>
                            <?else:?>
                                <?=implode(', ', $property['VALUE'])?>
                            <?endif;?>
						</div>
					</div>
				<?endforeach;?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<?endif;?>
<?if ($arFlags['SHOW_ACCESSORIES']):?>
    <div class="startshop-indents-vertical indent-50"></div>
	<div class="startshop-row">
        <?$GLOBALS["arrFilter"] = array("ID" => $arResult["PROPERTIES"]["CML2_ACCESORIES"]["VALUE"]);?> 		 	
		<?$APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"slider",
			Array(
				"AJAX_MODE" => "N",
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => "",
				"SECTION_CODE" => "",
				"SECTION_USER_FIELDS" => array(),
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_ORDER" => "asc",
				"FILTER_NAME" => "arrFilter",
				"FLEXISEL_ID" => "accesoriesList",
				"INCLUDE_SUBSECTIONS" => "Y",
                "TITLE" => GetMessage('PRODUCT_ACCESSORIES'),
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
				"PAGE_ELEMENT_COUNT" => "10",
				"LINE_ELEMENT_COUNT" => $arFlags['SHOW_LEFT_MENU'] ? '3' : '5',
				"PROPERTY_CODE" => array(0=>"HIT",1=>"RECOMMEND",2=>"NEW",3=>"",),
				"OFFERS_FIELD_CODE" => array("ID"),
				"OFFERS_PROPERTY_CODE" => array(),
				"OFFERS_SORT_FIELD" => "sort",
				"OFFERS_SORT_ORDER" => "asc",
				"OFFERS_LIMIT" => "2",
				"PRICE_CODE" => $arParams["PRICE_CODE"],
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
				"AJAX_OPTION_HISTORY" => "N",
                "CURRENCY" => $arParams['CURRENCY']
			)
		);?>
    </div>
<?endif;?>
<?if ($arFlags['SHOW_DOCUMENTS']):?>
    <div class="startshop-indents-vertical indent-50"></div>
	<div class="startshop-row">
		<div class="startshop-title"><?=GetMessage("PRODUCT_DOCUMENTS")?></div>
		<div class="startshop-indents-vertical indent-25"></div>
        <?include('Documents.php')?>
    </div>
<?endif;?>