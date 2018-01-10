<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(is_array($arResult["ITEMS"])&&count($arResult["ITEMS"])>1){?>
	<div class="prod_old_day">
		<div class="title"><?=GetMessage("DAY_BEFORE")?></div>
		<?foreach( $arResult["ITEMS"] as $arItem ){?>
			<div class="elem">
				<div class="photo_elem">
				<?if($arItem['PREVIEW_PICTURE']){
				
					$img = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array( "width" => 60, "height" => 60 ), BX_RESIZE_IMAGE_PROPORTIONAL, true, array() );?>	
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
						<img border="0" src="<?=$img["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
					</a>
				<?}else{?>
					<a href="<?=$arItem['DETAIL_PAGE_URL']?>"class="pd_no_photo">
						<img border="0" src="<?=SITE_TEMPLATE_PATH?>/images/noimg/noimg_minquadro.jpg" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" style="width:60px;"/>
					</a>
				<?}?>
				</div>
			<div class="name"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
			</div>
			<div style="clear:left"></div>
		<?}?>	
	</div>
<?}?>