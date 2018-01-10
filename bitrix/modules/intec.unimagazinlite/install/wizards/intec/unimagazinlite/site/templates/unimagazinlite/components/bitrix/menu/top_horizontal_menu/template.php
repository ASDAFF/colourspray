<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?$li_width = 100/count($arResult);?>
<?
global $options;
if (empty($arResult))
	return;
?>
<div class="bg_top_menu<?=$arParams["TYPE_MENU"] == 'solid'?' solid solid_element':' '.$arParams["TYPE_MENU"]?><?=$arParams["MENU_WIDTH_SIZE"] == "Y"?' wide':' normal'?><?=' '.$arParams["MENU_IN"]?>">
	<div class="radius_top_menu">
		<div id="min_menu_mobile" class="min_menu solid_element"><?=GetMessage("MENU_TITLE")?></div>
		<table class="top_menu" cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="td_delimiter">
					<hr>
				</td>
				<?foreach( $arResult as $key => $arItem ){?>
                    <?$isCatalog = 0;
                    $isServices = 0;
                    if($arItem["LINK"] == $arParams["IBLOCK_CATALOG_DIR"] ){
                        $isCatalog="1";
                    }
                    if($arItem["LINK"] == $arParams["IBLOCK_SERVICES_DIR"] ){
                        $isServices="1";
                    }
					$catalogWithOutSubsection = 0;
					if ($options['MENU_CATALOG_SECTION']['ACTIVE_VALUE']=='without_subsection') {
						$catalogWithOutSubsection = 1;
					}
					if(!$isCatalog && $arParams["TYPE_MENU"] == "catalog" || $arParams["TYPE_MENU"] != "catalog") {?>
						<td <?if ($arParams['SMOOTH_COLUMNS'] == 'Y'){?>style="width:<?=$li_width?>%; <?=($isCatalog && $catalogWithOutSubsection)? 'position: relative;':'1'?>"<?}else{?> style="<?=($isCatalog && $catalogWithOutSubsection)? 'position: relative;':''?>"<?}?> class="<?=$arItem['SELECTED']?'current':''?> <?=$isCatalog?'td_catalog parent':''?> <?=$isServices? 'parent':''?> <?=$arItem["IS_PARENT"]?'parent':''?>">
							<a href="<?=$arItem["LINK"]?>" class="title_f ">
								<span class="arrow">
									<?=$arItem["TEXT"]?>
								</span>
							</a>
							<a href="<?=$arItem["LINK"]?>" class="mobile_link">
								<span class="arrow">
									<?=$arItem["TEXT"]?>
								</span>
							</a>
							<?if($arItem["LINK"] == $arParams["IBLOCK_CATALOG_DIR"] ){?>
								<?$APPLICATION->IncludeComponent(
									"bitrix:catalog.section.list",
									"top_catalog",
									Array(
										"IBLOCK_TYPE" => $arParams["IBLOCK_CATALOG_TYPE"],
										"IBLOCK_ID" => $arParams["IBLOCK_CATALOG_ID"],
										"SECTION_ID" => "",
										"SECTION_CODE" => "",
										"COUNT_ELEMENTS" => "N",
										"TOP_DEPTH" => "2",
										"SECTION_FIELDS" => array(0=>"",1=>"",),
										"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
										"SECTION_URL" => "",
										"CACHE_TYPE" => "A",
										"CACHE_TIME" => "36000000",
										"CACHE_GROUPS" => "Y",
										"ADD_SECTIONS_CHAIN" => "N"
									),
									$component,
									array('HIDE_ICONS'=>'Y')
								);?>
							<?}?>
                            <?if($arItem["LINK"] == $arParams["IBLOCK_SERVICES_DIR"] ){?>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:catalog.section.list",
                                    "top_catalog",
                                    Array(
                                        "IBLOCK_TYPE" => $arParams["IBLOCK_SERVICES_TYPE"],
                                        "IBLOCK_ID" => $arParams["IBLOCK_SERVICES_ID"],
                                        "SERVICES_MENU" => 'Y',
                                        "SECTION_ID" => "",
                                        "SECTION_CODE" => "",
                                        "COUNT_ELEMENTS" => "N",
                                        "TOP_DEPTH" => "1",
                                        "SECTION_FIELDS" => array(0=>"",1=>"",),
                                        "SECTION_USER_FIELDS" => array(0=>"",1=>"",),
                                        "SECTION_URL" => "",
                                        "CACHE_TYPE" => "A",
                                        "CACHE_TIME" => "36000000",
                                        "CACHE_GROUPS" => "Y",
                                        "ADD_SECTIONS_CHAIN" => "N"
                                    )
                                );?>
                            <?}?>
							<?if( $arItem["IS_PARENT"] ){?>
								<div class="child submenu">						
									<?foreach( $arItem["ITEMS"] as $arSubItem ){?>
										<?if($arSubItem["DEPTH_LEVEL"]>2) {
											continue;
										}?>
										<a class="hover_link" href="<?=$arSubItem["LINK"]?>"><?=$arSubItem["TEXT"]?></a>
									<?}?>
								</div>
								<div class="submenu_mobile">						
									<?foreach( $arItem["ITEMS"] as $arSubItem ){?>
										<?if($arSubItem["DEPTH_LEVEL"]>2) {
											continue;
										}?>
										<a class="hover_link" href="<?=$arSubItem["LINK"]?>"><?=$arSubItem["TEXT"]?></a>
									<?}?>
								</div>
							<?}?>					
							
						</td>
					<?}?>
				<?}?>
			<td>
			<div class="search_wrap">
					<?$APPLICATION->IncludeComponent(
						"bitrix:search.title", 
						"header_search", 
						array(
							"NUM_CATEGORIES" => "1",
							"TOP_COUNT" => "5",
							"ORDER" => "date",
							"USE_LANGUAGE_GUESS" => "Y",
							"CHECK_DATES" => "N",
							"SHOW_OTHERS" => "N",
							"PAGE" => SITE_DIR."catalog/",
							"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
							"CATEGORY_0" => array(
							),
							"CATEGORY_0_iblock_catalog" => array(
								0 => "all",
							),
							"SHOW_INPUT" => "Y",
							"INPUT_ID" => "title-search-input",
							"CONTAINER_ID" => "search",
							"PRICE_CODE" => array(
								0 => "BASE",
							),
							"PRICE_VAT_INCLUDE" => "Y",
							"PREVIEW_TRUNCATE_LEN" => "",
							"SHOW_PREVIEW" => "Y",
							"PREVIEW_WIDTH" => "300",
							"PREVIEW_HEIGHT" => "300",
							"CONVERT_CURRENCY" => "Y",
							"CURRENCY_ID" => "RUB",
							"COMPONENT_TEMPLATE" => "header_search"
						),
						false
					);?>
				</div>
			</td>
			</tr>
		</table>
	</div>
</div>


