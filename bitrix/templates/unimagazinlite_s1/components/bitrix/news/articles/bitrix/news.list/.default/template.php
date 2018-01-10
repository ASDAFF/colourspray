<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (count($arResult["ITEMS"]) < 1)
	return;
?>
<?foreach($arResult["ITEMS"] as $arItem){	
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])||!empty($arItem["DETAIL_PICTURE"]["SRC"])){
		if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])){
			$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>500, 'height'=>500),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		}else{
			$file = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"],array('width'=>500, 'height'=>500),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		}
		$src=$file['src'];
	}else{
		$src=SITE_TEMPLATE_PATH."/images/noimg_min.jpg";
	}?>
	<div class="one_news" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img_news" style="background-image:url(<?=$src?>)">			
		</a>
		<div class="body_news">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name_news"><?=$arItem["NAME"];?></a>			
			<div class="prev_text">
				<?=$arItem["~PREVIEW_TEXT"]?>
			</div>
			<?if($arItem["ACTIVE_FROM"]!=""){?>
				<div class="period">
					<p> 
						<?=$arItem["ACTIVE_FROM"]?>						
					</p>
				</div>
			<?}?>
		</div>		
	</div>
<?}?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>