<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul class="inner_menu staff">
	<?foreach($arResult["SECTIONS"] as $arSection){
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));?>
		<li <?=$arSection['ID'] == $arParams["VARIABLES"]["CURRENT_SECTION"] ? 'class="current"' : ''?> id="<?=$this->GetEditAreaId($arSection['ID']);?>">
			<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
				<span><?=$arSection["NAME"]?></span>
			</a>
		</li>
	<?}?>
</ul>