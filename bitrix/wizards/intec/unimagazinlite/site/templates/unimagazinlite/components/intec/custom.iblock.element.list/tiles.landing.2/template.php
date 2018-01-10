<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="tiles landing-1">
    <div class="tiles-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arElement):?>
            <?
                $sListPageUrl = $arElement['LIST_PAGE_URL'];
			    $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
			    $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
            <div class="tiles-tile">
                <a class="tiles-tile-wrapper<?=$arParams['USE_LINK_TO_ELEMENTS'] != 'Y' ? ' tiles-tile-not_link' : ''?>"<?=$arParams['USE_LINK_TO_ELEMENTS'] == 'Y' ? ' href="'.$arElement['DETAIL_PAGE_URL'].'"' : ''?> id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                    <div class="tiles-tile-image" style="padding-top: <?=$arParams['PICTURE_BLOCK_HEIGHT']?>;">
                        <div class="tiles-tile-image-wrapper">
                            <?if (!empty($arElement['PICTURE'])):?>
                                <div class="uni-image">
                                    <div class="uni-aligner-vertical"></div>
                                    <img src="<?=$arElement['PICTURE']?>" />
                                </div>
                            <?endif;?>
                        </div>
                    </div>
                    <div class="tiles-tile-information">
                        <div class="tiles-tile-information-name">
                            <?=$arElement['NAME']?>
                        </div>
                        <div class="uni-indents-vertical indent-5"></div>
                        <div class="tiles-tile-information-description">
                            <?=$arElement['PREVIEW_TEXT']?>
                        </div>
                    </div>
                </a>
            </div>
        <?endforeach;?>
    </div>
    <?if (!empty($arParams['LINK_TO_ELEMENTS'])):?>
        <div class="uni-indents-vertical indent-25"></div>
        <div class="tiles-buttons">
            <a class="tiles-buttons-more button-bg" href="<?=htmlspecialcharsbx($arParams['LINK_TO_ELEMENTS'])?>">
                <div class="tiles-buttons-more-text">
                    <?=GetMessage("TILES_BUTTONS_MORE")?>
                </div>
            </a>
        </div>
    <?endif;?>
</div>