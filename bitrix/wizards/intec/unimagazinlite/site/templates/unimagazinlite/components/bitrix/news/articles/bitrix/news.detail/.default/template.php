<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="bx_news_detail">
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
    <div class="date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div><br>
    <?endif;?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
	<a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="fancy left" style="float:left;margin-right:25px;margin-bottom:15px;">
		<?$file = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"],array('width'=>200, 'height'=>200),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
			$src=$file['src'];
		?>
		<img class="detail_picture" border="0" src="<?=$src?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	</a>
	<?endif?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
 	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
 	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
</div>