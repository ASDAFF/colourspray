<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="news_all">
	<div class="img">
		<?if( !empty($arResult["DETAIL_PICTURE"]) ):?>
			<?$img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array( "width" => 275, "height" => 600 ), BX_RESIZE_IMAGE_PROPORTIONAL, true, array() );?>
			<a class="fancy" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
				<img border="0" src="<?=$img["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
			</a>
		<?endif;?>
		<div class="gallery">
			<?if(is_array($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])){
			foreach( $arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => $arPhoto ){
				$arPhoto = CFile::GetFileArray($arPhoto);
				$img = CFile::ResizeImageGet($arPhoto, array( "width" => 87, "height" => 87 ), BX_RESIZE_IMAGE_EXACT, true, array() );?>
				<a class="fancy" rel="gallery" href="<?=$arPhoto["SRC"]?>">
					<img border="0" src="<?=$img["src"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" />
				</a>
			<?}}?>
		</div>
	</div>
	<div class="text">
		<?=$arResult["DETAIL_TEXT"]?>
		<div class="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
	</div>
	<div style="clear: both;"></div>
</div>