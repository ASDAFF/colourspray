<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="services-section uni_parent_col list">
	<?foreach($arResult["ITEMS"] as $arElement):
	
		$picture = array();
		$picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
			
		if (!empty($arElement['PREVIEW_PICTURE']))
		{
			$picture = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE']['ID'], array('width' => 55, 'height' => 55, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
		}
		else if (!empty($arElement['DETAIL_PICTURE']))
		{
			$picture = CFile::ResizeImageGet($arElement['DETAIL_PICTURE']['ID'], array('width' => 55, 'height' => 55, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
		}
		
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
	?>
		<a class="element uni_col uni-100" id="<?=$this->GetEditAreaId($arElement['ID']);?>" href="<?=$arElement['DETAIL_PAGE_URL']?>">
			<div class="image">
                <div class="uni-aligner-vertical"></div>
				<? if (!empty($picture)) { ?>
					<img src="<?=$picture['src']?>" alt="<?=htmlspecialcharsbx($arElement["NAME"])?>" title="<?=htmlspecialcharsbx($arElement["NAME"])?>"></img>
				<?}?>
			</div>
			<div class="content">
				<div class="name"><?=$arElement['NAME']?></div>
				<div class="description"><?=$arElement['PREVIEW_TEXT']?></div>
			</div>
		</a>
		<div class="clear"></div>
	<?endforeach;?>
	<div class="clear"></div>
	<div class="description uni-text-default uni_col uni-100<?=empty($arResult['ITEMS'])?' only':''?>">
		<?=$arResult['DESCRIPTION']?>
	</div>
	<div class="clear"></div>
</div>
