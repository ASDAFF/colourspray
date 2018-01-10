<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="article_detail">
	<div class="name"><?=$arResult["NAME"]?></div>
	<div class="left_data">
		<?if( is_array( $arResult["DETAIL_PICTURE"] ) ){?>
			<a class="fancy" rel="article_gallery" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
				<?$img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array( "width" => 180, "height" => 180 ), BX_RESIZE_IMAGE_EXACT, true, array() );?>
				<img border="0" src="<?=$img["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
			</a>
		<?}?>
		<? if (isset($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]) && count($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])>0) {?>
			<div class="gallery">
				<?foreach( $arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $arPhoto ){
					$img = CFile::ResizeImageGet($arPhoto, array( "width" => 800, "height" => 600 ), BX_RESIZE_IMAGE_EXACT, true, array() );?>
					<a class="fancy" rel="article_gallery" href="<?=$img["src"]?>">
						<?$img = CFile::ResizeImageGet($arPhoto, array( "width" => 87, "height" => 87 ), BX_RESIZE_IMAGE_EXACT, true, array() );?>
						<img border="0" src="<?=$img["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
					</a>
				<?}?>
			</div>
		<?}?>
	</div>
	<div class="right_data">
		<?=$arResult["DETAIL_TEXT"]?>
	</div>
</div>