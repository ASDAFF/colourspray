<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (empty($arResult["ALL_ITEMS"]))
    return;

if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css'))
    $APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css');

$menuBlockId = "catalog_menu_".$this->randString();
?>
<div class="services-sections-list menu" id="<?=$menuBlockId?>">

    <?foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):?>     <!-- first level-->
        <?$existPictureDescColomn = ($arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"] || $arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]) ? true : false;?>
        <div  class="element<?=$arResult["ALL_ITEMS"][$itemID]["SELECTED"]?' selected': ''?>">
            <div class="content">
                <a class="hover_link" href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>" data-description="<?=$arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]?>" <?if (is_array($arColumns) && count($arColumns) > 0 && $existPictureDescColomn):?>onmouseover="menuVertCatalogChangeSectionPicure(this);"<?endif?>>
                    <?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?>
                    <span class="bx_shadow_fix"></span>
                </a>
                <div class="selector">
                    <div class="uni-aligner-vertical"></div>
                    <i class="fa-angle-right fa"></i>
                </div>
                <?if (is_array($arColumns) && count($arColumns) > 0):?>
                    <span class="bx_children_advanced_panel">
				<img src="<?=$arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"]?>" alt="">
			</span>
                    <div class="bx_children_container b<?=($existPictureDescColomn) ? count($arColumns)+1 : count($arColumns)?>">
                        <?foreach($arColumns as $key=>$arRow):?>
                            <div class="bx_children_block">
                                <ul>
                                    <?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>  <!-- second level-->
                                        <li class="parent">
                                            <a class="hover_link" href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>" <?if ($existPictureDescColomn):?>ontouchstart="document.location.href = '<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>';" onmouseover="menuVertCatalogChangeSectionPicure(this);"<?endif?> data-picture="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["picture_src"]?>" data-description="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["description"]?>">
                                                <?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?>
                                            </a>
                                            <span class="bx_children_advanced_panel">
								<img src="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["PARAMS"]["picture_src"]?>" alt="">
							</span>
                                            <?if (is_array($arLevel_3) && count($arLevel_3) > 0):?>
                                                <ul>
                                                    <?foreach($arLevel_3 as $itemIdLevel_3):?>	<!-- third level-->
                                                        <li>
                                                            <a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"]?>" <?if ($existPictureDescColomn):?>ontouchstart="document.location.href = '<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>';return false;" onmouseover="menuVertCatalogChangeSectionPicure(this);return false;"<?endif?> data-picture="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["PARAMS"]["picture_src"]?>" data-description="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["PARAMS"]["description"]?>"><?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"]?></a>
                                                            <span class="bx_children_advanced_panel">
										<img src="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["PARAMS"]["picture_src"]?>" alt="">
									</span>
                                                        </li>
                                                    <?endforeach;?>
                                                </ul>
                                            <?endif?>
                                        </li>
                                    <?endforeach;?>
                                </ul>
                            </div>
                        <?endforeach;?>
                        <?if ($existPictureDescColomn):?>
                            <div class="bx_children_block advanced">
                                <div class="bx_children_advanced_panel">
						<span class="bx_children_advanced_panel">
							<a href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>"><span class="bx_section_picture">
								<img src="<?=$arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"]?>"  alt="">
							</span></a>
							<img src="<?=$this->GetFolder()?>/images/spacer.png" alt="" style="border: none;">
							<strong style="display:block" class="bx_item_title"><?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?></strong>
							<p class="bx_section_description bx_item_description"><?=$arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]?></p>
						</span>
                                </div>
                            </div>
                        <?endif?>
                        <div style="clear: both;"></div>
                    </div>
                <?endif?>
            </div>
        </div>
    <?endforeach;?>

    <div style="clear: both;"></div>
</div>