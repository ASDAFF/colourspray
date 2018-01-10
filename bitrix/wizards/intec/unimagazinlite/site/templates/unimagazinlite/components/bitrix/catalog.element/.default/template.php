<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$frame = $this->createFrame()->begin();
global $APPLICATION;
global $options;

reset($arResult['MORE_PHOTO']);

$arFlags = array(
	'SHOW_LEFT_MENU' => $arParams['SHOW_LEFT_MENU_IN_ELEMENT'] == "Y" ? true : false,
	'SHOW_SLIDER' => $arParams['SHOW_SLIDER_IN_ELEMENT'] == "Y" ? true : false,
	'SHOW_MINIMAL_PROPERTIES' => $arParams['SHOW_CUT_PROPS_OF_ELEMENT'] == "Y" ? true : false,
	'SHOW_TABS' => $options['CATALOG_PRODUCT_VIEW']['ACTIVE_VALUE'] == 'WITH_TABS' ? true : false,
    'SHOW_PRODUCT_OF_DAY' => $arParams['PRODUCT_OF_DAY_SHOW'] == 'Y' ? true : false,
    'SHOW_PRODUCT_OF_DAY_IF_END' => $arParams['PRODUCT_OF_DAY_SHOW_IF_END'] == 'Y' ? true : false,
    'SHOW_TITLE' => $arParams['SHOW_TITLE'] == 'Y' ? true : false,
    'SHOW_DESCRIPTION' => !empty($arResult['DETAIL_TEXT']),
    'SHOW_PROPERTIES' => !empty($arResult['DISPLAY_PROPERTIES']),
    'SHOW_ACCESSORIES' => (is_array($arResult["PROPERTIES"]["CML2_ACCESORIES"]["VALUE"]) && count($arResult["PROPERTIES"]["CML2_ACCESORIES"]["VALUE"]) > 0),
    'SHOW_REVIEWS' => is_numeric($arParams['REVIEWS_IBLOCK_ID']),
    'SHOW_ACCOMPANYING' => (is_array($arResult["PROPERTIES"]["CML2_ACCOMPANYING"]["VALUE"]) && count($arResult["PROPERTIES"]["CML2_ACCOMPANYING"]["VALUE"]) > 0),
    'SHOW_DOCUMENTS' => !empty($arResult['PROPERTIES']['CML2_DOCUMENTS']['VALUE']),
    'SHOW_PRODUCT_OF_DAY' => !empty($arResult['PROPERTIES']['CML2_DAY_PROD']['VALUE']),
    'SHOW_BRAND' => !empty($arResult['PROPERTIES']['CML2_BRAND']['VALUE']),
	'ADAPTABLE' => $arParams['ADAPTABLE'] == "Y" ? true : false
);
?>
<div class="startshop-catalog<?=$arFlags['ADAPTABLE'] ? ' adaptiv' : ''?>">
	<div class="startshop-item<?=$arFlags['SHOW_LEFT_MENU']?' with-menu':''?>">
        <?if ($arFlags['SHOW_PRODUCT_OF_DAY']):?>
    		<?include('parts/ProductOfDay.php')?>
    	<?endif;?>    
		<script>
			function StartShopSlider(slider, list, images)
			{
				this.slider = slider;
				this.list = list;
				this.images = images;
				
				this.constructor.prototype.scroll = function(direction) {
					var changing = 0;
					
					if (direction == 'left')
					{
						var changing = $(this.slider + ' ' + this.list + ' .startshop-items').scrollLeft() + $(this.slider + ' ' + this.list + ' .startshop-image-small').width();
					}
					else
					{
						var changing = $(this.slider + ' ' + this.list + ' .startshop-items').scrollLeft() - $(this.slider + ' ' + this.list + ' .startshop-image-small').width();
						
					}
					
					$(this.slider + ' ' + this.list + ' .startshop-items').animate({scrollLeft: changing}, 200);
				}
				
				this.constructor.prototype.show = function(object) {
					$(this.slider + ' .startshop-list .startshop-image-small').removeClass('selected');
					$(object).addClass('selected');
					$(this.slider + ' ' + this.images + ' .startshop-image').css('display', 'none');
					$(this.slider + ' ' + this.images + ' .startshop-image').eq($(object).index()).css('display', 'block');
				}
				
				this.constructor.prototype.hideAll = function() {
					$(this.slider + ' ' + this.images).hide();
					$(this.slider + ' ' + this.list).hide();
				}
				
				this.constructor.prototype.showAll = function() {
					$(this.slider + ' ' + this.images).show();
					$(this.slider + ' ' + this.list).show();
				}
				
				$(window).resize(function(){
					$(slider + ' ' + list + ' .items').scrollLeft(0);
				})
			}
		</script>
		<div class="startshop-row">
			<div class="startshop-image-slider">
				<div class="startshop-image-box">
					<div class="startshop-wrapper">
                        <div class="marks">
							<?if( $arResult["PROPERTIES"]["CML2_RECOMEND"]["VALUE"] ){?>
								<span class="mark recommend"><?=GetMessage("MARK_RECOMEND");?></span>
							<?}?>
							<?if( $arResult["PROPERTIES"]["CML2_NEW"]["VALUE"] ){?>
								<span class="mark new"><?=GetMessage("MARK_NEW");?></span>
							<?}?>
							<?if( $arResult["PROPERTIES"]["CML2_HIT"]["VALUE"] ){?>
								<span class="mark hit"><?=GetMessage("MARK_HIT");?></span>
							<?}?>			
						</div>
						<div class="startshop-slider-images" id="slider_images">
							<?if (!empty($arResult['MORE_PHOTO'])):?>
								<?$first = true?>
								<?foreach ($arResult['MORE_PHOTO'] as $photo):?>
									<a 
										rel='images' 
										href=<?=$photo['SRC']?>
										class="startshop-image startshop-fancy"
										style="height: 100%; width: 100%;<?if ($first == false):?> display: none;<?endif;?>"
									>
										<img src="<?=$photo['SRC']?>" />
										<div class="startshop-aligner-vertical"></div>
									</a>
									<?$first = false?>
								<?endforeach;?>
							<?else:?>
								<?$photo = $this->GetFolder().'/images/product.noimage.png'?>
								<div class="startshop-image" style="width: 100%; height: 100%">
									<img src="<?=$photo?>" />
									<div class="startshop-aligner-vertical"></div>
								</div>
							<?endif;?>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$('.startshop-fancy').startshopFancybox();
					})
				</script>
				<div class="clear"></div>
				<?if ($arFlags['SHOW_SLIDER']):?>
					<script type="text/javascript">
						var slider = new StartShopSlider('.startshop-image-slider', '#slider', '#slider_images');
					</script>
					<div class="startshop-list" id='slider'>
						<div class="startshop-buttons<?=((count($arResult['MORE_PHOTO']) <= 4 && !$arFlags['SHOW_LEFT_MENU'])||(count($arResult['MORE_PHOTO']) <= 2 && $arFlags['SHOW_LEFT_MENU'])) ? ' hidden' : ''?>">
							<div class="startshop-aligner-vertical"></div>
							<div class="startshop-buttons-wrapper">
								<div class="startshop-button startshop-slider-button-small startshop-slider-button-left" id="left" onClick="slider.scroll('right'); return false;"><div class="icon"></div></div>
								<div class="startshop-button startshop-slider-button-small startshop-slider-button-right" id="right" onClick="slider.scroll('left'); return false;"><div class="icon"></div></div>
							</div>
						</div>
						<div class="startshop-items">
							<?if (count($arResult['MORE_PHOTO']) > 1) {?>
								<?foreach($arResult['MORE_PHOTO'] as $photo) {?>
									<div class="startshop-image-small" onClick="slider.show(this); return false;">
										<div class="startshop-image-small-wrapper">
											<div>
												<div>
													<div class="startshop-aligner-vertical"></div>
													<img src="<?=$photo['SRC']?>" />
												</div>
											</div>
										</div>
									</div>
								<?}?>
							<?}?>
						</div>
					</div>
				<?endif;?>
			</div>
			<div class="startshop-information">
                <?if ($arFlags['SHOW_BRAND']):?>
                    <div class="startshop-information-brand">
                        <?$APPLICATION->IncludeComponent("intec:custom.iblock.element", 'picture.link.1', array(
                            "IBLOCK_ELEMENT_ID" => $arResult['PROPERTIES']['CML2_BRAND']['VALUE'],
                            "USE_PREVIEW_PICTURE" => "Y",
                            "USE_DETAIL_PICTURE" => "Y",
                            "PICTURE_WIDTH" => "100",
                            "PICTURE_HEIGHT" => "100",
                            "NO_PICTURE_PATH" => $this->GetFolder().'/images/product.noimage.png'
                        ), false)?>
                    </div>
                <?endif;?>
				<div class="startshop-row">
					<?if (!empty($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'])):?>
						<div class="startshop-article"><?=GetMessage('PRODUCT_ARTICLE')?>: <?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']?></div>
					<?endif;?>
					<div class="startshop-state available" style="<?=!$arResult['CAN_BUY'] ? 'display: none;' : ''?>">
						<div class="startshop-icon"></div>
						<?=GetMessage('PRODUCT_HAVE')?>
						<span <?=$arResult['CATALOG_QUANTITY'] == 0?'style="display: none;"':''?>><?=$arResult['CATALOG_QUANTITY']?></span>
					</div>
					<div class="startshop-state unavailable" style="<?=$arResult['CAN_BUY'] ? 'display: none;' : ''?>">
						<div class="startshop-icon"></div>
						<?=GetMessage('PRODUCT_NOT_HAVE')?>
					</div>
				</div>
				<div class="startshop-indents-vertical indent-25"></div>
				<div class="startshop-row">
					<?include('parts/Order.php')?>
				</div>
			</div>
			
			<?if ($arFlags['SHOW_LEFT_MENU']):?><div class="clear"></div><?endif;?>
			<div class="startshop-information with-menu">
				<?if (!empty($arResult['PREVIEW_TEXT'])):?>
					<div class="startshop-indents-vertical indent-25"></div>
					<div class="startshop-row">
						<div class="startshop-description startshop-text-default">
							<?=$arResult['PREVIEW_TEXT']?>
						</div>
					</div>
				<?endif;?>
				<?if ($arFlags['SHOW_MINIMAL_PROPERTIES']):?>
					<?include('parts/PropertiesMinimal.php')?>
				<?endif;?>
			</div>
			
			<div class="clear"></div>
		</div>
		<?
			$properties = $arResult['DISPLAY_PROPERTIES'];	
		?>
		<div class="startshop-row">
			<?if ($arFlags['SHOW_TABS']):?>
				<?include('parts/ViewWithTabs.php')?>
			<?else:?>
				<?include('parts/ViewWithoutTabs.php')?>
			<?endif;?>
		</div>
        <?if ($arFlags['SHOW_ACCOMPANYING']):?>
            <div class="startshop-indents-vertical indent-50"></div>
        	<div class="startshop-row">
                <?$GLOBALS["arrFilter"] = array("ID" => $arResult["PROPERTIES"]["CML2_ACCOMPANYING"]["VALUE"]);?> 		 	
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
                        "TITLE" => GetMessage('PRODUCT_GOING_GOODS'),
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
        <?session_start();?>
        <?if (!is_array($_SESSION["VIEWED_PRODUCTS"])) $_SESSION["VIEWED_PRODUCTS"] = array();?>
        <?if (!in_array($arResult['ID'], $_SESSION["VIEWED_PRODUCTS"])):?>
            <?$_SESSION["VIEWED_PRODUCTS"][] = $arResult['ID']?>
        <?endif;?>
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
                        "TITLE" => GetMessage('PRODUCT_YOU_LOOKED'),
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
        <?if (!$arFlags['SHOW_TABS']):?>
            <div class="startshop-indents-vertical indent-50"></div>
        	<div class="startshop-row">
        		<div class="startshop-title"><?=GetMessage("PRODUCT_REVIEWS")?></div>
        		<div class="startshop-indents-vertical indent-25"></div>
                <?include('parts/Reviews.php')?>
            </div>
        <?endif;?>
	</div>
	<div style="clear: both;"></div>
</div>
<?$frame->end()?>