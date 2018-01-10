<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?$frame = $this->createFrame()->begin()?>

<?$display = array_key_exists("DIFFERENT", $_REQUEST) ? 'all' : 'differences' ;?>
<!--noindex-->
    <div class="uni-tabs">
    	<div class="tabs">
            <div class="tab<?=$_REQUEST["DIFFERENT"] == '' ? ' ui-state-active' : '';?>">
                <a rel="nofollow" href="<?=SITE_DIR;?>catalog/compare.php?action=COMPARE&IBLOCK_ID=<?=$arParams["IBLOCK_ID"]?>"><span><?=GetMessage('CATALOG_ALL_CHARACTERISTICS')?></span></a>
            </div>
    		<div class="tab<?=$_REQUEST["DIFFERENT"] != '' ? ' ui-state-active' : '';?>">
                <a rel="nofollow" href="<?=SITE_DIR;?>catalog/compare.php?action=COMPARE&IBLOCK_ID=<?=$arParams["IBLOCK_ID"]?>&DIFFERENT=Y"><span><?=GetMessage('CATALOG_ONLY_DIFFERENT')?></span></a>
            </div>
    		<div class="bottom-line"></div>
    	</div>
    </div>
	<div class="clear"></div>
<!--/noindex-->

<div class="differences_table">
<?if( count( $arResult["ITEMS"] ) > 4 ):?>
	<input type="hidden" name="start_position" value="<?=$arResult["START_POSITION"]?>" />
	<input type="hidden" name="end_position" value="<?=$arResult["END_POSITION"]?>" />
	<div class="left_arrow dec"></div>
	<div class="right_arrow inc"></div>
<?endif;?>
<table>
	<tr>
		<td class="preview"></td>
		<?$position = 0;?>
		<?foreach( $arResult["ITEMS"] as $arItem ){	
		  
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
			?>
			<td class="item_td item_<?=$arItem["ID"]?>" <?=$position >= 4 ? 'style="display: none;"' : ''?>>
				<div class="table_item item_ws hover_shadow">
					<div class="remove_item"><a href="<?=SITE_DIR?>catalog/compare.php?action=DELETE_FROM_COMPARE_RESULT&ID=<?=$arItem['ID'];?>" class="delete"></a></div>
					<div class="image">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="thumb_cat uni-image">
							<div class="uni-aligner-vertical"></div>
							
							<?if( !empty($arItem["PREVIEW_PICTURE"]) ){?>
								<?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>170, 'height'=>170),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
								<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
							<?}else{?>
								<img src="<?=SITE_TEMPLATE_PATH?>/images/noimg/no-img.png" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
							<?}?>
						</a>
					</div>
					<a class="desc_name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>					
					<div class="price">
						<div class="discount-price">
							<?if (empty($arItem['STARTSHOP']['OFFERS'])):?>
                                    <span><?=$arItem['STARTSHOP']['PRICES']['MINIMAL']['PRINT_VALUE']?></span>
                                <?else:?>
                                    <?$arPrice = CStartShopToolsIBlock::GetOffersMinPrice($arItem);?>
                                    <?if (!empty($arPrice)):?>
                                        <span><?=GetMessage("FROM")?> <?=$arPrice['PRINT_VALUE']?></span>
                                    <?endif;?>
                                    <?unset($arPrice);?>
                                <?endif;?>
						</div>
					</div>
				</div>
			</td>
			<?$position++;?>
		<?}?>
		<? if (count($arResult["ITEMS"]) < 4) { ?>
			<? for ($i = 0; $i < 4 - count($arResult["ITEMS"]); $i++) { ?>
				<td class="item_td empty"></td>
			<? } ?>
		<? } ?>
	</tr>
	
	<tr class="properties">
		<td colspan="5">
			<?foreach( $arResult["DISPLAY_PROPERTIES"] as $key => $arProp ):?>
				<div class="property">
					+ <?=$arProp['NAME']?>
				</div>
			<?endforeach;?>
		</td>
	</tr>
	
	<?$prop_count = 1;?>
	<?foreach( $arResult["DISPLAY_PROPERTIES"] as $key => $arProp ){
		
		$arCompare = array();
		foreach($arProp["ITEMS"] as $arElement){
			$arPropertyValue = $arElement["VALUE"];
			
			if(is_array($arPropertyValue))
			{
				sort($arPropertyValue);
				
				$arPropertyValue = implode(" / ", $arPropertyValue);
			}
			$arCompare[] = $arPropertyValue;
		}
        
		$diff = (count(array_unique($arCompare)) > 1 ? true : false);
		if($diff || empty($_REQUEST["DIFFERENT"]) ){?>
			<tr class="hovered prop_<?=$prop_count?>">
				<td class="prop_name"><?=$arProp["NAME"]?><div class="close"></div></td>
				<?$position = 0;?>
				<?foreach( $arResult["ITEMS"] as $arElement ){?>
					<?
						$key = $arElement['ID'];
						$arItem = $arProp['ITEMS'][$key];
					?>
					<? if (is_array($arItem)):?>
						<td class="prop_item item_<?=$key?>" <?=$position >= 4 ? 'style="display: none;"' : ''?>>
							<?if (is_array($arItem["VALUE"])) {
									$prop = implode(" / ",$arItem["VALUE"]);
								} else {$prop = $arItem["DISPLAY_VALUE"];}?>
								<?=$prop?>
						</td>
					<?else:?>
						<td class="prop_item item_<?=$key?>" <?=$position >= 4 ? 'style="display: none;"' : ''?>></td>
					<?endif;?>
					<?$position++;?>
				<?}?>
				<? if (count($arResult["ITEMS"]) < 4) { ?>
					<? for ($i = 0; $i < 4 - count($arResult["ITEMS"]); $i++) { ?>
						<td></td>
					<? } ?>
				<? } ?>
			</tr>
		<?}?>
		<?$prop_count++?>
	<?}?>
</table>
</div>
<?if (is_array($_SESSION["VIEWED_PRODUCTS"]) && count($_SESSION["VIEWED_PRODUCTS"]) > 0):?>
    <div class="startshop-indents-vertical indent-50"></div>
	<div class="startshop-row">
        <?$GLOBALS["arrFilter"] = array("ID" => $_SESSION["VIEWED_PRODUCTS"])?> 		 	
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
				"FLEXISEL_ID" => "accompanyingList",
				"INCLUDE_SUBSECTIONS" => "Y",
                "TITLE" => GetMessage('VIEWED_PRODUCTS'),
				"SHOW_ALL_WO_SECTION" => "Y",
				"SECTION_URL" => "",
				"DETAIL_URL" => "",
				"BASKET_URL" => $arParams['BASKET_URL'],
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
				"LINE_ELEMENT_COUNT" => '5',
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
<script type="text/javascript">
	$(document).ready(function() {
		$('.table_item .delete').click(function(e){
			e.preventDefault();
			var k = $(this).attr('href');
			$.post(k)		
			.done(function (Res) {			
				location.reload();
			})	
		});
		$('.differences_table td.prop_name .close').click(function(){
			var index = $(this).parent().parent().index() - 2;
			$(this).parent().parent().css('display', 'none');
			$('.differences_table tr.properties td .property').eq(index).css('display', 'block');
		});
		
		$('.differences_table tr.properties td .property').click(function(){
			var index = $(this).index() + 2;
			$(this).css('display', 'none');
			$('.differences_table tr').eq(index).css('display', 'table-row');
		});
		
		$('.differences_table .left_arrow, .differences_table .right_arrow').on("click", function(){				
			var pos_start = $('input[name$="start_position"]').val();
			var pos_end = $('input[name$="end_position"]').val();
		
			var count_items = $('.differences_table td.item_td').length;

			if( $(this).hasClass('inc') && pos_end < count_items ){
				$('input[name$="start_position"]').val(++pos_start);
				$('input[name$="end_position"]').val(++pos_end);
			}else if( $(this).hasClass('dec') && pos_start > 1 ){
				$('input[name$="start_position"]').val(--pos_start);
				$('input[name$="end_position"]').val(--pos_end);
			}
			
			$('.differences_table td.item_td').each(function(){
				var index = $(this).index();
				if( index < pos_start || index > pos_end ){
					$(this).hide();
				}else{
					$(this).show();
				}
			})
			
			$('.differences_table td.prop_item').each(function(){
				var index = $(this).index();
				if( index < pos_start || index > pos_end ){
					$(this).hide();
				}else{
					$(this).show();
				}
			})
		
		});
	})
</script>
<?$frame->end()?>

