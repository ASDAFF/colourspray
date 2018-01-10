<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="group_list">
	<?$i = 1;
	foreach($arResult["SECTIONS"] as $arSection){
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="group_item <?=($i % 4 == 0) ? 'last' : ''?> <?=($i % 2 == 0) ? 'two' : ''?> <?=($i % 3 == 0) ? 'three' : ''?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
			<div class="group_item_inner">
				<div class="image">
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
						<?if( !empty( $arSection["PICTURE"] ) ){?>
							<img src="<?=$arSection["PICTURE"]["SRC"]?>" alt="<?=$arSection["NAME"]?>" title="<?=$arSection["NAME"]?>" />
						<?}else{?>
							<img src="<?=SITE_TEMPLATE_PATH?>/img/noimage_group.png" alt="<?=$arSection["NAME"]?>" title="<?=$arSection["NAME"]?>" />
						<?}?>
					</a>
				</div>
				<div class="name">
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
						<?=$arSection["NAME"]?>
					</a>
				</div>
			</div>
		</div>
		
	<?$i++;
	}?>
</div>
<?/*
<div style="margin-top: 20px;">
	<?=$arResult["SECTION"]["DESCRIPTION"]?>
</div>
*/?>