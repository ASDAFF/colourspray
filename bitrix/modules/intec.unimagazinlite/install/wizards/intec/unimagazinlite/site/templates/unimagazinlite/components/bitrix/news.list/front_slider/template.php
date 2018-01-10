<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="flexslider">
	<div class="flex-viewport">
	<ul class="slides">
		<?foreach( $arResult["ITEMS"] as $arItem ){?>
			<li>
				<?if( is_array( $arItem["DETAIL_PICTURE"] ) ){
					if( !empty($arItem["PROPERTIES"]["LINK"]["VALUE"]) ){?>
						<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
					<?}?>
						<img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" width="100%" />
					<?if( !empty($arItem["PROPERTIES"]["LINK"]["VALUE"]) ){?>
						</a>
					<?}
				}?>
			</li>
		<?}?>
	</ul>
	</div>
</div>