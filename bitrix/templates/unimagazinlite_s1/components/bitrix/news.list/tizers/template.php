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
global $options;?>
<?
	switch ($arParams['LINE_ELEMENT_COUNT']) {
		case 3: $gridStyle = "uni-33"; break;
		case 4: $gridStyle = "uni-25"; break;
		case 5: $gridStyle = "uni-20"; break;
		default : $gridStyle = "uni-50"; break;
	}
?>
<?if(is_array($arResult["ITEMS"])&&count($arResult["ITEMS"])>0){?>
	<div class="tizers-list <?=$arParams["SIZE"]?>">
		<ul>
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?	
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<li id="<?=$this->GetEditAreaId($arItem['ID']);?>" class='uni_col <?=$gridStyle?>'>
					<?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>64, 'height'=>64),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
					<div class="img_banner" style="background-image:url(<?=$file['src']?>)">
					</div>
					<div class="r_col">
						<div class="name title_f"><?=$arItem["NAME"];?></div>
					</div>					
				</li>	
			<?endforeach;?>
		</ul>
	</div>
	<div class="clear"></div>
<?}?>
