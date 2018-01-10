<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (count($arResult["ITEMS"]) < 1)
	return;
?>
<h3 class="header_grey"><?=$arParams["TEXT_TITLE"]?></h3>
<ul class="shares uni_parent_col">
<?foreach($arResult["ITEMS"] as $arItem){
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])||!empty($arItem["DETAIL_PICTURE"]["SRC"])){
		if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])){
			$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>467, 'height'=>248),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		}else{
			$file = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"],array('width'=>467, 'height'=>248),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		}
		$src=$file['src'];
	}else{
		$src=SITE_TEMPLATE_PATH."/images/noimg/noimg_quadro.jpg";
	}?>
	<li class="one_shares" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img_shares" style="background-image:url(<?=$src?>)">			
		</a>
		<div class="body_shares">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name_shares"><?=$arItem["NAME"];?></a>
			<?/*<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name_shares">
				<?=GetMessage("NEWS_SHARES")?> <?=$arItem["PROPERTIES"]["SHARES_END"]["VALUE"]?>
			</a>*/?>
			<?if($arItem["PROPERTIES"]["PERIOD"]["VALUE"]!=""){?>
				<div class="period">
					<p>
						<?=$arItem["PROPERTIES"]["PERIOD"]["VALUE"]?> 
					</p>
				</div>
			<?}?>
			<div class="prev_text">
				<?=$arItem["PREVIEW_TEXT"]?>
			</div>
		</div>	
		<a class="detail_shares" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=GetMessage("SHARES_DETAIL")?></a>
	</li>
<?}?>
</ul>
<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>