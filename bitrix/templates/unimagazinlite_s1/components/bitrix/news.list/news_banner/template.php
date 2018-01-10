<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news_block">
	<?/*<div class="title">
		<a href="<?=$arResult["LANG_DIR"]?>company/news/"><?=GetMessage('NEWS_TITLE')?></a>
	</div>*/?>
	<h3><?=GetMessage("BEST_SHARE")?></h3>

	<ul>
		<?foreach($arResult["ITEMS"] as $arItem){
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?if(strpos($arItem["PROPERTIES"]["LINK"]["VALUE"], "http") == 0)
				{
				$arItem["PROPERTIES"]["LINK"]["VALUE"] = SITE_DIR.$arItem["PROPERTIES"]["LINK"]["VALUE"];
				$arItem["PROPERTIES"]["LINK"]["VALUE"] = str_replace("//", "/", $arItem["PROPERTIES"]["LINK"]["VALUE"]);
				}
				
				?>
			<li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<?/*<div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>*/?>
				<?//print_r($arItem);?>
				<?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT );?>
				<a class="name" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
					<div class="banner_img" style="background:url(<?=$file['src'];?>)no-repeat center;background-size:contain;"></div>
				</a>
				<?/*
				<div class="banner_title">
					<a class="name" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>"><?=TruncateText($arItem["NAME"],50);?></a>
				</div>
				*/?> 
				<?/*$obParser = new CTextParser;
				if($arParams["PREVIEW_TRUNCATE_LEN"] > 0)
				$arItem["PROPERTIES"]["BANNER_TEXT"]["~VALUE"]["TEXT"] = $obParser->html_cut($arItem["PROPERTIES"]["BANNER_TEXT"]["~VALUE"]["TEXT"], $arParams["PREVIEW_TRUNCATE_LEN"]);?>
				<div class="banner_text"><?=$arItem["PROPERTIES"]["BANNER_TEXT"]["~VALUE"]["TEXT"];?></div>*/?>
			</li>
		<?}?>
	</ul>
</div>