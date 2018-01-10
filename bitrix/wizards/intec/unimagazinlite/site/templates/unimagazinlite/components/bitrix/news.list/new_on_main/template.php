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
$this->setFrameMode(true);?>
<?if(is_array($arResult["ITEMS"])&&!empty($arResult["ITEMS"])){?>
	<?$i=0;?>
	<div class="main_news standart_block">
		<?$href = str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"]);?>
		<div class="header_grey left left-news"><?=$arResult["NAME"]?></div>		
		<a class="all_news  right-news" href="<?=$href?>"><?=GetMessage("ALL_NEWS")?></a>
		<div class="clear"></div>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
			<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<div class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
				<?endif?>	
				<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a class="name_news" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
					<?else:?>
						<?echo $arItem["NAME"]?>
					<?endif;?>
				<?endif;?>
				<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
					<div class="preview">
						<?echo $arItem["PREVIEW_TEXT"];?>
					</div>
				<?endif;?>
				
			</div>
			<?$i++;?>
		<?endforeach;?>
	</div> 	
<?}?>

