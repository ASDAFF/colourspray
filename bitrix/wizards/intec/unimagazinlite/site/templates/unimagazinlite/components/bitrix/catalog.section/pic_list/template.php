<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
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

if (!empty($arResult['ITEMS'])){	
	if ($arParams["DISPLAY_TOP_PAGER"])
	{
		 echo $arResult["NAV_STRING"];
	}
	
	$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
	
	foreach($arResult["ITEMS"] as $cell=>$arElement) {			
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], $strElementEdit);
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		$strMainID = $this->GetEditAreaId($arElement['ID']);
		
		$arItemIDs = array(
			'ID' => $strMainID,
			'PICT' => $strMainID.'_pict',
			'SECOND_PICT' => $strMainID.'_secondpict',

			'QUANTITY' => $strMainID.'_quantity',
			'QUANTITY_DOWN' => $strMainID.'_quant_down',
			'QUANTITY_UP' => $strMainID.'_quant_up',
			'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
			'BUY_LINK' => $strMainID.'_buy_link',
			'SUBSCRIBE_LINK' => $strMainID.'_subscribe',

			'PRICE' => $strMainID.'_price',
			'DSC_PERC' => $strMainID.'_dsc_perc',
			'SECOND_DSC_PERC' => $strMainID.'_second_dsc_perc',

			'PROP_DIV' => $strMainID.'_sku_tree',
			'PROP' => $strMainID.'_prop_',
			'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
			'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
		);?>	
		
		<div class="one_section_product" id="<?=$this->GetEditAreaId($arElement['ID']);?>">			
			<?if(!empty($arElement["DETAIL_PICTURE"]["SRC"])){
				$file = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"],array('width'=>230, 'height'=>170),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
						$src=$file['src'];
					}else{
						$src=SITE_TEMPLATE_PATH."/images/noimg/noimg_quadro.jpg";
				}?>
			<div class="img_products">
				<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="image_product" style="background-image:url(<?=$src?>)">					
				</a>
				<div class="marks">
					<?if( $arElement["PROPERTIES"]["STOCK"]["VALUE"] ){?>
						<span class="mark share"></span>
					<?}?>
					<?if( $arElement["PROPERTIES"]["HIT"]["VALUE"] ){?>
						<span class="mark hit"></span>
					<?}?>			
					<?if( $arElement["PROPERTIES"]["NEW"]["VALUE"] ){?>
						<span class="mark new"></span>
					<?}?>
				</div>
			</div>
			<div class="name_section">
				<div class="name_product">
					<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
				</div>
				<div class="options">
					<?$i=0;
					foreach($arElement["DISPLAY_PROPERTIES"] as $prop){
						if($i>5){
							break;
						}
						$i++;
						echo "<div>".$prop["NAME"]." &mdash; ".$prop["VALUE"]."</div>";
					}?>
				</div>
			</div>
			<?$flg_offers=0;
			$newprice = preg_replace( "/^([\d\s\.\,]+)(.*)$/", '$1<span>$2</span>', $arElement["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"] );
			$oldprice = "";
			if( $arElement['MIN_PRICE']['DISCOUNT_VALUE'] < $arElement['MIN_PRICE']['VALUE'] ) {
				$oldprice= preg_replace ( "/^([\d\s\.\,]+)(.*)$/", '$1<span>$2</span>', $arElement["MIN_PRICE"]["PRINT_VALUE"] );
			}		
			if( !empty($arElement["OFFERS"]) ){
				$flg_offers=1;		
				$newprice="<span>".GetMessage("CT_BCS_TPL_MESS_PRICE_FROM")." </span>".$newprice;		
			}?>	
			<div class="buys">		
				<div class="price_block">						
					<div class="new_price"><?=$newprice?></div>
					<?if($oldprice!=""){?>					
						<div class="old_price"><?=$oldprice?></div>
					<?}?>			
				</div>
				<?if ($arElement['CAN_BUY'] || $flg_offers){
					/*if ('Y' == $arParams['USE_PRODUCT_QUANTITY']){?>
						<div class="bx_catalog_item_controls_blockone">
							<div style="display: inline-block;position: relative;">
								<a id="<? echo $arItemIDs['QUANTITY_DOWN']; ?>" href="javascript:void(0)" class="bx_bt_button_type_2 bx_small" rel="nofollow">-</a>
								<input type="text" class="bx_col_input" id="<? echo $arItemIDs['QUANTITY']; ?>" name="<? echo $arParams["PRODUCT_QUANTITY_VARIABLE"]; ?>" value="<? echo $arElement['CATALOG_MEASURE_RATIO']; ?>">
								<a id="<? echo $arItemIDs['QUANTITY_UP']; ?>" href="javascript:void(0)" class="bx_bt_button_type_2 bx_small" rel="nofollow">+</a>
								<span id="<? echo $arItemIDs['QUANTITY_MEASURE']; ?>"><? echo $arItem['CATALOG_MEASURE_NAME']; ?></span>
							</div>
						</div>
					<?}*/?>
					<div class="buy_block">
						<a rel="nofollow" 
							class="buy" 
							id="buy_<?=$arElement['ID']?>"
							<?if(!$flg_offers){?>
								onclick="return add_to_cart(<?=$arElement['ID']?>,'<?=GetMessage("CATALOG_ADDED")?>',this,1,'<?=$arParams["BASKET_URL"];?>','<?=$arElement['ID']?>','<?=$arParams['IBLOCK_ID']?>','<?=$arParams['IBLOCK_TYPE']?>')"
							<?}else{?>
								href="<?=$arElement["DETAIL_PAGE_URL"]?>"
							<?}?>><?=GetMessage("CATALOG_ADD_TO_BASKET")?></a>
				
						<a 
							href="<?=$arParams["BASKET_URL"];?>" 
							id="buyed_<?=$arElement['ID']?>" 
							rel="nofollow" 
							class="buy added"
							style="display:none"
						>
							<?=GetMessage("CATALOG_ADDED")?>
						</a>
						
					</div>
				<?}/*else{?>
					<div class="not_available">
						<?=GetMessage("CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE")?>
					</div>
				<?}*/?>
				<?if($arParams["DISPLAY_COMPARE"]=="Y"){?>
					<!--noindex-->
						<div class="compare">
							<div 
								onclick="add_to_compare(this,'<?=$arParams['IBLOCK_TYPE']?>','<?=$arParams["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=$arElement['COMPARE_URL']?>')"
								class="text" 
								id="textcomp_<?=$arElement["ID"]?>"				
							>
								<?echo GetMessage("CATALOG_COMPARE")?>
							</div>
							<div 
								style="display:none" 
								class="text1" 
								id="addedcomp_<?=$arElement["ID"]?>" 								
								onclick="return delete_to_compare(this,'<?=$arParams['IBLOCK_TYPE']?>','<?=$arParams["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=SITE_DIR?>catalog/compare.php?action=DELETE_FROM_COMPARE_RESULT&ID=<?=$arElement['ID']?>')"
							>							
								<?echo GetMessage("CATALOG_COMPARED")?>
							</div>
						</div>
						<div class="like">
							<div 
								style="<?=($liked?'display:none':'')?>"
								onclick="add_to_like(this,'<?=$arElement["ID"]?>','1')"
								class="text" 	
								id="like_<?=$arElement["ID"]?>"
							>
								<?echo GetMessage("LIKE_TEXT")?>
							</div>
							<div 
								style="<?=(!$liked?'display:none':'')?>"
								class="text1"
								id="liked_<?=$arElement["ID"]?>" 								
								onclick="return delete_to_like(this,'<?=$arElement["ID"]?>')"
								title="<?=GetMessage('LIKE_DELETE_TEXT_DETAIL')?>"
							>							
								<?echo GetMessage("LIKE_DELETE_TEXT")?>
							</div>
						</div>
						
					<!--/noindex-->
				<?}?>	

				
			</div>
			<div class="clear"></div>
		</div>		
	<?}//endforeach
	if($arParams["DISPLAY_BOTTOM_PAGER"]){
		echo $arResult["NAV_STRING"];
	}
}//end if?>

