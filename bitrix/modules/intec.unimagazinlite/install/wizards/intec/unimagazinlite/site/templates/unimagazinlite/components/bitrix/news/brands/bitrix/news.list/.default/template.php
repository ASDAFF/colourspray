<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?
if (count($arResult["ITEMS"]) < 1)
	return;
?>
<?global $options;?>
<div class="brands uni_parent_col">

<?foreach($arResult["ITEMS"] as $arItem):?>
<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('NEWS_ELEMENT_DELETE_CONFIRM')));
	
?>
	<?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])||!empty($arItem["DETAIL_PICTURE"]["SRC"])){
		if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])){
			$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>184, 'height'=>138),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		}else{
			$file = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"],array('width'=>184, 'height'=>138),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		}
		$src=$file['src'];
	}else{
		$src=false;
	}?>
	<div class="brand uni_col <?=$arParams["NEWS_LIST_GRID_COLUMNS_COUNT"]?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">		
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="image">
			<div class="wrapper">
				<div class="valign"></div>
				<?if ($src):?>
					<img src="<?=$src?>" />
				<?else:?>
					<div class="text"><?=$arItem['NAME']?></div>
				<?endif;?>
			</div>
		</a>
	</div>
<?endforeach;?>
</div>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>