<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (count($arResult) > 0):?>
<div class="view-list">
	<div class="header_grey"><?=GetMessage("VIEW_HEADER");?></div>
	<?foreach($arResult as $arItem):?>
		<div class="one_see">
			<?if($arParams["VIEWED_IMAGE"]=="Y"):
				if(is_array($arItem["PICTURE"])){?>
					<a class="img_see" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PICTURE"]["src"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"></a>
				<?}else{?>
					<a class="img_see" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=SITE_TEMPLATE_PATH.'/images/noimg/noimg_minquadro.jpg'?>" style="width:<?=$arParams['VIEWED_IMG_WIDTH']?>px" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"></a>
				<?}?>
			<?endif?>
			<div class="right_see">
				<?if($arParams["VIEWED_NAME"]=="Y"):?>
					<div class="name_see"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
				<?endif?>
				<?if($arParams["VIEWED_PRICE"]=="Y" && $arItem["CAN_BUY"]=="Y"):?>
					<div class="price_see"><?=$arItem["PRICE_FORMATED"]?></div>
				<?endif?>
				<?if($arParams["VIEWED_CANBUY"]=="Y" && $arItem["CAN_BUY"]=="Y"):?>
					<noindex>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="nofollow"><?=GetMessage("PRODUCT_BUY")?></a>
					</noindex>
				<?endif?>
				<?if($arParams["VIEWED_CANBASKET"]=="Y" && $arItem["CAN_BUY"]=="Y"):?>
					<noindex>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" rel="nofollow"><?=GetMessage("PRODUCT_BASKET")?></a>
					</noindex>
				<?endif?>
			</div>
			<div class="clear"></div>
		</div>
	<?endforeach;?>
</div>
<?endif;?>