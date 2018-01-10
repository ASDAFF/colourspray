<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (empty($arResult["ALL_ITEMS"]))
	return;

if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css'))
	$APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css');

$menuBlockId = "catalog_menu_".$this->randString();
?>
<div class="bx_vertical_menu_advanced hover_shadow bx_<?=$arParams["MENU_THEME"]?>" id="<?=$menuBlockId?>">
	<ul id="ul_<?=$menuBlockId?>" class="standart_block <?=$arParams["HIDE_CATALOG"]=="Y"?"hide_catalog":""?>">
	<?foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):?>     <!-- first level-->
		<?$existPictureDescColomn = ($arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"] || $arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]) ? true : false;?>
		<li onmouseover="BX.CatalogVertMenu.itemOver(this);" onmouseout="BX.CatalogVertMenu.itemOut(this)" class="bx_hma_one_lvl <?if($arResult["ALL_ITEMS"][$itemID]["SELECTED"]):?>current<?endif?><?if (is_array($arColumns) && count($arColumns) > 0):?><?endif?>">
			<a class="hover_link" href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>">
				<?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?>
				<span class="bx_shadow_fix"></span>
			</a>
		<?if (is_array($arColumns) && count($arColumns) > 0):?>
			<div class="bx_children_container hover_shadow b<?=($existPictureDescColomn) ? count($arColumns)+1 : count($arColumns)?>">
				<?foreach($arColumns as $key=>$arRow):?>
				<div class="bx_children_block hover_shadow">
					<ul>
					<?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>  <!-- second level-->
						<li class="parent">
							<a class="hover_link" href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>">
								<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?>
							</a>
						<?if (is_array($arLevel_3) && count($arLevel_3) > 0):?>
							<ul>
							<?foreach($arLevel_3 as $itemIdLevel_3):?>	<!-- third level-->
								<li>
									<a class="hover_link" href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"]?>" <?if ($existPictureDescColomn):?>ontouchstart="document.location.href = '<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>';return false;" onmouseover="menuVertCatalogChangeSectionPicure(this);return false;"<?endif?> data-picture="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["PARAMS"]["picture_src"]?>" ><?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"]?></a>
								</li>
							<?endforeach;?>
							</ul>
						<?endif?>
						</li>
					<?endforeach;?>
					</ul>
				</div>
				<?endforeach;?>
				<div style="clear: both;"></div>
			</div>
		<?endif?>
		</li>
	<?endforeach;?>
	</ul>
	<div style="clear: both;"></div>
</div>
<div>
<?if(!empty($arParams["COUNT_ITEMS_CATALOG"])){?>
	<style>
	/*hide_catalog*/
	.bx_vertical_menu_advanced ul.hide_catalog li.bx_hma_one_lvl {
		display:none;
	}
	.bx_vertical_menu_advanced ul.hide_catalog li.bx_hma_one_lvl:nth-child(-n+<?=$arParams["COUNT_ITEMS_CATALOG"]?>) {
		display:block;
	}
	.bx_vertical_menu_advanced ul.hide_catalog:hover li.bx_hma_one_lvl {
		display:block;
		 -webkit-transition: all 0.5s ease;
    -webkit-transition-delay: 0.5s;
	}
	</style>
<?}?>
</div>