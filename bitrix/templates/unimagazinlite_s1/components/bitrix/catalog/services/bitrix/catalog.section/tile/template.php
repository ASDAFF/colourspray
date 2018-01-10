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

switch ($arParams['LINE_ELEMENT_COUNT']) {
	case 3: $gridStyle = "uni-33"; break;
	case 4: $gridStyle = "uni-25"; break;
	case 5: $gridStyle = "uni-20"; break;
	default : $gridStyle = "uni-50"; break;
}
?>
<div class="services-section tile uni_parent_col">
<?
	foreach ($arResult['ITEMS'] as &$arElement)
	{
		$picture = array();
		$picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
			
		if (!empty($arElement['PREVIEW_PICTURE']))
		{
			$picture = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE']['ID'], array('width' => 500, 'height' => 500, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
		}
		else if (!empty($arElement['DETAIL_PICTURE']))
		{
			$picture = CFile::ResizeImageGet($arElement['DETAIL_PICTURE']['ID'], array('width' => 500, 'height' => 500, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
		}
		
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
?>
	<div class="uni_col<?=' '.$gridStyle?>">
		<div class="element" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
			<a class="wrapper hover_shadow" href="<? echo $arElement["DETAIL_PAGE_URL"]; ?>">
				<div class="image">
					<div>
						<div class="uni-aligner-vertical"></div>
						<? if (is_array($picture)) { ?>
							<img src="<?=$picture['src']?>" alt="<?=htmlspecialcharsbx($arElement["NAME"])?>" title="<?=htmlspecialcharsbx($arElement["NAME"])?>"></img>
						<?}?>
					</div>
				</div>
				<div class="text">
					<div class="text-wrapper"><? echo $arElement["NAME"];?></div>
				</div>
			</a>
		</div>
	</div>
<?
	}
?>
	<div class="clear"></div>	
	<div class="description uni_col uni-text-default uni-100<?=empty($arResult['ITEMS'])?' only':''?>"><?=$arResult['DESCRIPTION']?></div>
	<div class="clear"></div>	
</div>
