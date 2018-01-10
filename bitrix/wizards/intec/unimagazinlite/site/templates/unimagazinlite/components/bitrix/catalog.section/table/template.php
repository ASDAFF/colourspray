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
if (!empty($arResult['ITEMS'])) {	
	if ($arParams["DISPLAY_TOP_PAGER"])
	{
		 echo $arResult["NAV_STRING"];
	}
	
	$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));?>
	
	<div class="bg_table"><table cellspacing="0" cellpadding="0">
		<tr>
			<th class="td_photo"><div class="bg"><?=GetMessage("CELL_PHOTO")?></div></th>
			<th class="td_name"><div class="bg"><?=GetMessage("CELL_NAME")?></div></th>
			<th class="td_price"><div class="bg"><?=GetMessage("CELL_PRICE")?></div></th>
			<?if($arParams["USE_PRODUCT_QUANTITY"]=="Y"){?>			
				<th class="td_warehouse"><div class="bg"><?=GetMessage("CELL_WAREHOUSE")?></div></th>
			<?}?>
			<th class="td_buy"><div class="bg"><?=GetMessage("CELL_BUY")?></div></th>
			<?if($arParams["DISPLAY_COMPARE"]=="Y"):?>
				<th class="compare"><div class="bg">&nbsp;</div></th>
			<?endif;?>
		</tr>
		<?foreach($arResult["ITEMS"] as $cell=>$arElement){$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], $strElementEdit);
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
			<tr id="<?=$this->GetEditAreaId($arElement['ID']);?>">
				<td class="td_photo">
					<?if(!empty($arElement["DETAIL_PICTURE"]["SRC"])){
						$file = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"],array('width'=>41, 'height'=>41),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
						$src=$file['src'];
					}else{
							$src=SITE_TEMPLATE_PATH."/images/noimg/noimg_minquadro.jpg";
					}?>
					<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="image_product" style="background-image:url(<?=$src?>);"></a>
				</td>
				<td class="td_name">
					<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
				</td>
				<td class="td_price">
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
					<div class="new_price"><?=$newprice?></div>
					<?if($oldprice!=""){?>					
						<div class="old_price"><?=$oldprice?></div>
					<?}?>	
				</td>
				<?if($arParams["USE_PRODUCT_QUANTITY"]=="Y"){?>			
					<td class="td_warehouse">
						<?if($arElement["CATALOG_QUANTITY"]>0){?>
							<?=GetMessage("QUNTITY_OK")?> (<?=$arElement["CATALOG_QUANTITY"]?>)
						<?}else{?>
							<?if($flg_offers){?>
								<?=GetMessage("QUNTITY_OK")?>
							<?}else{?>
								<?=GetMessage("QUNTITY_FAIL")?>
							<?}?>
						<?}?>
					</td>
				<?}?>
				<td class="td_buy">
					<?if ($arElement['CAN_BUY'] || $flg_offers) {?>
						<a rel="nofollow" 
							class="buy" 
							id="buy_<?=$arElement['ID']?>"
							<?if(!$flg_offers){?>
								onclick="return add_to_cart(<?=$arElement['ID']?>,'<?=GetMessage("CATALOG_ADDED")?>',this,1,'<?=$arParams["BASKET_URL"];?>','<?=$arElement['ID']?>','<?=$arParams['IBLOCK_ID']?>','<?=$arParams['IBLOCK_TYPE']?>')"
							<?}else{?>
								href="<?=$arElement["DETAIL_PAGE_URL"]?>"
							<?}?>
							>
							<?=GetMessage("CATALOG_ADD_TO_BASKET")?>
						</a>
						<a 
							href="<?=$arParams["BASKET_URL"];?>"
							style="display:none"
							id="buyed_<?=$arElement['ID']?>"							
							rel="nofollow" 
							class="buy added">
							<?=GetMessage("CATALOG_ADDED")?>
						</a>
						
					<?} else { ?>
						<div class="not_available">
							<?=GetMessage("CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE")?>
						</div>
					<?}?>
				</td>
				<?if($arParams["DISPLAY_COMPARE"]=="Y"):?>
					<td class="compare_like">
						<?if($arParams["DISPLAY_COMPARE"]=="Y"){?>
							<!--noindex-->
								<div class="compare">
									<div 
										onclick="add_to_compare(this,'<?=$arParams['IBLOCK_TYPE']?>','<?=$arParams["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=$arElement['COMPARE_URL']?>')"
										class="text" 
										id="textcomp_<?=$arElement["ID"]?>"
										title="<?=GetMessage('COMPARE_TEXT')?>"
									>
										<?echo GetMessage("CATALOG_COMPARE")?>
									</div>
									<div 
										style="display:none" 
										class="text1" 
										id="addedcomp_<?=$arElement["ID"]?>" 
										onclick="return delete_to_compare(this,'<?=$arParams['IBLOCK_TYPE']?>','<?=$arParams["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=SITE_DIR?>catalog/compare.php?action=DELETE_FROM_COMPARE_RESULT&ID=<?=$arElement['ID']?>')"
										title="<?=GetMessage('COMPARE_DELETE_TEXT')?>"
									>
										<?echo GetMessage("CATALOG_COMPARED")?>
									</div>
								</div>
								<div class="like">
									<div 
										style="<?=(!$liked?'':'display:none')?>"
										onclick="add_to_like(this,'<?=$arElement['ID']?>',1)"
										id="like_<?=$arElement['ID']?>"
										class="text" 										
										title="<?=GetMessage('LIKE_TEXT')?>"
									>
										<?echo GetMessage("CATALOG_COMPARE")?>
									</div>
									<div 
										style="<?=($liked?'':'display:none')?>"
										class="text1" 	
										id="liked_<?=$arElement['ID']?>"										
										onclick="return delete_to_like(this,'<?=$arElement['ID']?>')"
										title="<?=GetMessage('LIKE_DELETE_TEXT')?>"
									>
										<?echo GetMessage("LIKE_DELETE_TEXT")?>
									</div>
								</div>
							<!--/noindex-->
						<?}?>	
					</td>
				<?endif;?>
			</tr>
		<?}?>
	</table></div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
<?}?>