<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<?
    $iTizersCount = count($arResult['ELEMENTS']);
    if ($iTizersCount <= 5) $sTizerStyle = 'tizers-tizer-'.count($arResult['ELEMENTS']);
    if ($iTizersCount >= 6) $sTizerStyle = 'tizers-tizer-5';
?>
<div class="tizers landing-1">
    <div class="tizers-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arTizer):?>
            <?
                $this->AddEditAction($arTizer['ID'], $arTizer['EDIT_LINK'], CIBlock::GetArrayByID($arTizer["IBLOCK_ID"], "ELEMENT_EDIT"));
			    $this->AddDeleteAction($arTizer['ID'], $arTizer['DELETE_LINK'], CIBlock::GetArrayByID($arTizer["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="tizers-tizer<?=' '.$sTizerStyle?>" id="<?=$this->GetEditAreaId($arTizer['ID']);?>">
                <div class="tizers-tizer-image solid solid_element">
                    <div class="uni-image">
                        <div class="uni-aligner-vertical"></div>
                        <img src="<?=$arTizer['PICTURE']?>" />
                    </div>
                </div>
                <div class="uni-indents-vertical indent-20"></div>
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
        <?endforeach;?>
    </div>
</div>