<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h3><?echo GetMessage("HEADER");?><?=$arResult["SECTION"]["PATH"]["0"]["NAME"]?></h3><div class="shops_link">
<a href="<?=$arResult["SECTION"]["PATH"][0]["LIST_PAGE_URL"]?>"><?echo GetMessage("ANOTHER_CITY");?></a></div>
<div class="clear"></div>
<ul class="address">
	<?foreach( $arResult["ITEMS"] as $arItem ){
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="img_wrap">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="left_img">
					<?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0], array('width'=>112, 'height'=>112), BX_RESIZE_IMAGE_EXACT, true);?>
					<img src="<?=$file["src"]?>">
				</a>
			</div>
			<div class="info">
				<span><?=$arItem["NAME"]?></span><br>
				<?=GetMessage("TEL")?> <span><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></span><br>
				<span><?=$arItem["PROPERTIES"]["EMAIL"]["VALUE"]?></span><br>
			</div>
			<a class="detail_link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=GetMessage("DETAIL")?></a>
			
		</li>
	<?}?>
</ul>