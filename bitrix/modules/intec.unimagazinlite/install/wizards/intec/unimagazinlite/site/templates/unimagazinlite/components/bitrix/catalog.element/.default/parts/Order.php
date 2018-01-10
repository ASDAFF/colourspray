<div class="startshop-price">
	<div class="startshop-current" id="price"><?=$arResult['MIN_PRICE']['PRINT_VALUE']?></div>
</div>
<?if ($options['TYPE_BASKET']['ACTIVE_VALUE'] != 'none'):?>
	<div class="startshop-indents-vertical indent-25"></div>
		<div class="startshop-order">
		<div class="startshop-aligner-vertical"></div>
		<?if ($arResult['CAN_BUY'] || $arParams["DISPLAY_COMPARE"]=="Y"):?>
			<?if ($arResult['CAN_BUY']):?>
				<?if ($arResult['IN_CART'] == "N"):?>
					<div class="startshop-count">
						<button id="decrease" class="startshop-button">-</button>
						<input type="text" name="count" value="1" />
						<button id="increase" class="startshop-button">+</button>
						<script type="text/javascript">	
							var counter = new StartShopInputNumeric('.startshop-item .startshop-order .startshop-count input[type=text]')
							counter.value = 1;
							counter.minimum = 1;
							counter.ratio = 1;
							counter.maximum = <?=$arResult['CATALOG_QUANTITY']?>;
							<?if ($arResult['CATALOG_USE_QUANTITY'] == "Y"):?>
								counter.unlimited = false;
							<?endif;?>
															
							$(document).ready(function(){								
								$('.startshop-count #decrease').click(function(){	
									counter.decrease();
								})
								
								$('.startshop-count #increase').click(function(){
									counter.increase();
								})
							})
							
							counter.on('onValueChange', function(event, data){
								$('.startshop-item .startshop-order .startshop-count input[type=text]').val(data.value);
							})
						</script>
					</div>
					<div class="startshop-indents-horizontal indent-10"></div>
					<div class="startshop-buy">			
						<a rel="nofollow" class="startshop-button startshop-button-standart to-cart" id="to_cart_<?=$arResult['ID']?>" onClick="window.location.href = '<?=$APPLICATION->GetCurPageParam('action=addtocart', array('action', 'count'))?>&count=' + counter.value">
							<?=GetMessage("CATALOG_ADD_TO_BASKET")?>
						</a>
					</div>
					
				<?else:?>
					<div class="startshop-buy">			
						<a rel="nofollow" href="<?=$arParams["BASKET_URL"];?>" id="in_cart_<?=$arResult['ID']?>" class="startshop-button startshop-button-standart startshop-status-focus to-cart-added">
							<?=GetMessage("CATALOG_ADDED")?>
						</a>
					</div>
				<?endif;?>
			<?endif;?>
			<?if($arParams["DISPLAY_COMPARE"]=="Y"):?>
				<div class="startshop-indents-horizontal indent-10"></div>
				<div class="min-buttons">
					<div class="min-button compare">
						<div class="add addToCompare addToCompare<?=$arResult["ID"]?>"
							onclick="return addToCompare('<?=SITE_DIR?>', '<?=$arResult['IBLOCK_TYPE_ID']?>','<?=$arResult["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=$arResult['COMPARE_URL']?>')" 
							title="<?=GetMessage('COMPARE_TEXT_DETAIL')?>"
						>
						</div>
						<div class="remove removeFromCompare removeFromCompare<?=$arResult["ID"]?>"
							style="display:none"
							onclick="return removeFromCompare('<?=SITE_DIR?>', '<?=$arResult['IBLOCK_TYPE_ID']?>','<?=$arResult["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=$arResult['COMPARE_REMOVE_URL']?>')"
							title="<?=GetMessage('COMPARE_DELETE_TEXT_DETAIL')?>"
						>
						</div>
					</div>
				</div>
			<?endif?>
		<?endif;?>
	</div>
<?endif;?>