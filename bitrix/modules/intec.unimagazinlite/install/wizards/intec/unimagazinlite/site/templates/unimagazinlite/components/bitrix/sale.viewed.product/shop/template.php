<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (count($arResult) > 0){?>
	<div class="view-list">
		<?foreach( $arResult as $key => $arItem ){?>
			<div class="view-item <?if(!$arResult[$key+1]):?> last<?endif;?>">
				<?if( $arParams["VIEWED_IMAGE"]=="Y" && is_array($arItem["PICTURE"]) ){?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"].$arItem["PRODUCT_ID"]."/"?>">
						<div class="seen_img" style="background:url(<?=$arItem["PICTURE"]["src"]?>) no-repeat center">							
						</div>
					</a>
				<?}else{?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"].$arItem["PRODUCT_ID"]."/"?>">
						<div class="seen_img" style="background:url(<?=SITE_TEMPLATE_PATH."/img/noimage_group.png";?>) no-repeat center">							
						</div>
					</a>
				<?}?>
				<div class="view_item_info">
				<?if( $arParams["VIEWED_NAME"]=="Y" ){?> 
					<div><a href="<?=$arItem["DETAIL_PAGE_URL"].$arItem["PRODUCT_ID"]."/"?>"><?=$arItem["NAME"]?></a></div>
				<div style="clear:left"></div>	
				<?}?>
				<?if( $arParams["VIEWED_PRICE"]=="Y" && $arItem["CAN_BUY"]=="Y" ){?>
					<div class="view_item_price"><?=$arItem["PRICE_FORMATED"]?></div>
					
				<?}?>
				
				<!--noindex-->
					<?if( $arParams["VIEWED_CANBUY"]=="Y" && $arItem["CAN_BUY"]=="Y" ){?>
						<a rel="nofollow" href="<?=$arItem["BUY_URL"]?>"><?=GetMessage("PRODUCT_BUY")?></a>
					<?}?>
					<?if( $arParams["VIEWED_CANBUSKET"]=="Y" && $arItem["CAN_BUY"]=="Y" ){?>
						<a rel="nofollow" href="<?=$arItem["ADD_URL"]?>"><?=GetMessage("PRODUCT_BUSKET")?></a>
					<?}?>
				<!--/noindex-->
			</div>
			<div style="clear:left"></div>	
			</div>
		<?}?>
	</div>
<?}?>
