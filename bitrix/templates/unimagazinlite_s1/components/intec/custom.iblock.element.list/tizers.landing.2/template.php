<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="tizers landing-2">
    <div class="tizers-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arTizer):?>
            <?
                $this->AddEditAction($arTizer['ID'], $arTizer['EDIT_LINK'], CIBlock::GetArrayByID($arTizer["IBLOCK_ID"], "ELEMENT_EDIT"));
			    $this->AddDeleteAction($arTizer['ID'], $arTizer['DELETE_LINK'], CIBlock::GetArrayByID($arTizer["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="tizers-tizer">
                <div class="tizers-tizer-wrapper" id="<?=$this->GetEditAreaId($arTizer['ID']);?>">
                    <div class="tizers-tizer-image">
                        <div class="uni-image solid solid_element">
                            <div class="uni-aligner-vertical"></div>
                            <img src="<?=$arTizer['PICTURE']?>" />
                        </div>
                    </div>
                    <div class="tizers-tizer-information">
                        <div class="tizers-tizer-information-caption">
                            <?=$arTizer['NAME']?>
                        </div>
                        <div class="uni-indents-vertical indent-15"></div>
                        <div class="tizers-tizer-information-text">
                            <?=$arTizer['PREVIEW_TEXT']?>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>