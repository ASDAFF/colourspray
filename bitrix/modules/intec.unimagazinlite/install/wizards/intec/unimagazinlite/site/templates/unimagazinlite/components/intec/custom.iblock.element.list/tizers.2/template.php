<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="tizers-2">
    <div class="tizers-2-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arTizer):?>
            <?
                $this->AddEditAction($arTizer['ID'], $arTizer['EDIT_LINK'], CIBlock::GetArrayByID($arTizer["IBLOCK_ID"], "ELEMENT_EDIT"));
			    $this->AddDeleteAction($arTizer['ID'], $arTizer['DELETE_LINK'], CIBlock::GetArrayByID($arTizer["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="tizers-2-tizer uni-33">
                <div class="tizers-2-tizer-wrapper" id="<?=$this->GetEditAreaId($arTizer['ID']);?>">
                    <div class="tizers-2-image uni-image">
                        <div class="uni-aligner-vertical"></div>
                        <img src="<?=$arTizer['PICTURE']?>" alt="<?=$arTizer['NAME']?>" />
                    </div>
                    <div class="tizers-2-information">
                        <div class="tizers-2-name">
                            <?=$arTizer['NAME']?>
                        </div>
                        <div class="tizers-2-description">
                            <?=$arTizer['PREVIEW_TEXT']?>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>