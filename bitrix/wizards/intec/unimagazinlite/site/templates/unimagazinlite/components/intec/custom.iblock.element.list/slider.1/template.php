<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<?global $options;?>
<?$sUniquieID = 'slider_1'.spl_object_hash($this);?>
<?$sSliderType = $options['HEADER_WIDTH_SIZE']['ACTIVE_VALUE'] == 'Y' ? 'slider-1-type-wide' : 'slider-1-type-tigh'?>
<div class="slider-1 <?=$sSliderType?>" id="<?=$sUniquieID?>">
    <div class="slider-1-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arElement):?>
            <?
                $sTypeClass = 'slider-1-type-image';
                $sTextClass = 'slider-1-text-light';
                
                if ($arElement['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'TEXT_LEFT') $sTypeClass = 'slider-1-type-text-left';
                if ($arElement['PROPERTIES']['TYPE']['VALUE_XML_ID'] == 'TEXT_RIGHT') $sTypeClass = 'slider-1-type-text-right';
                
                if ($arElement['PROPERTIES']['COLOR']['VALUE_XML_ID'] == 'DARK') $sTextClass = 'slider-1-text-dark';
                
                $sImageBackground = CFile::GetPath($arElement['PROPERTIES']['BACKGROUND']['VALUE']);
                $sImageActive = CFile::GetPath($arElement['PROPERTIES']['PICTURE']['VALUE']);
                
                $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
			    $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a href="<?=str_replace(array('#SITE_DIR#'), array(SITE_DIR), $arElement['PROPERTIES']['LINK']['VALUE'])?>" class="slider-1-slide <?=$sTypeClass?> <?=$sTextClass?>"<?=!empty($sImageBackground) ? ' style="background-image: url(\''.$sImageBackground.'\');"' : ''?> id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                <div class="slider-1-slide-wrapper">
                    <?if (!empty($sImageActive)):?>
                        <div class="slider-1-image uni-image">
                            <div class="uni-aligner-vertical"></div>
                            <img src="<?=$sImageActive?>" alt="" />
                        </div>
                    <?endif;?>
                    <?if ($arElement['PROPERTIES']['TYPE']['VALUE_XML_ID'] != 'IMAGE'):?>
                        <div class="uni-aligner-vertical"></div>
                        <div class="slider-1-information">
                            <div class="slider-1-header">
                                <?=$arElement['NAME']?>
                            </div>
                            <?if (!empty($arElement['PREVIEW_TEXT'])):?>
                                <div class="slider-1-text">
                                    <?=$arElement['PREVIEW_TEXT']?>
                                </div>
                            <?endif;?>
                        </div>
                    <?endif;?>
                </div>
            </a>
        <?endforeach;?>
    </div>
	<?if (count($arResult['ELEMENTS'])>1){?>
    <div class="slider-1-button-wrapper slider-1-button-wrapper-left">
        <div class="slider-1-button uni-slider-button uni-slider-button-left" onclick="return $<?=$sUniquieID?>.SlideRight();">
            <div class="icon"></div>
        </div>
        <div class="uni-aligner-vertical"></div>
    </div>
    <div class="slider-1-button-wrapper slider-1-button-wrapper-right">
        <div class="uni-aligner-vertical"></div>
        <div class="slider-1-button uni-slider-button uni-slider-button-right" onclick="return $<?=$sUniquieID?>.SlideLeft();">
            <div class="icon"></div>
        </div>
    </div>
    <script type="text/javascript">
        var $<?=$sUniquieID?> = new UNISlider({
            'OFFSET': 4,
            'INFINITY_SLIDE': true,
            'INFINITY_SLIDER': true,
            'SLIDER': '#<?=$sUniquieID?> .slider-1-wrapper',
            'ELEMENT': '#<?=$sUniquieID?> .slider-1-wrapper .slider-1-slide',
            'ANIMATE': true,
            'ANIMATE_SPEED': 500,
            'AUTO_SLIDE': <?=$arParams['AUTO_SLIDE'] == 'Y' ? 'true' : 'false'?>,
            'AUTO_SLIDE_TIME': <?=intval($arParams['AUTO_SLIDE_TIME'])?>,
            'EVENTS': {
                'onAdaptabilityChange': function ($oSlider) {
                    $oSlider.Settings.OFFSET = Math.round($oSlider.GetSliderWidth() / $oSlider.GetElementWidth());
                    
                     if ($oSlider.Settings.OFFSET < $oSlider.GetElementsCount()) {
                        $('#<?=$sUniquieID?> slider-1-button-wrapper').show();
                     } else {
                        $('#<?=$sUniquieID?> slider-1-button-wrapper').hide();
                     }
                },
                'onBeforeAnimate': function ($oSlider, $oSettings) {
                    $('#<?=$sUniquieID?> .slider-1-wrapper .slider-1-slide .slider-1-information').hide();
                },
                'onAfterAnimate': function ($oSlider, $oSettings) {
                    $('#<?=$sUniquieID?> .slider-1-wrapper .slider-1-slide .slider-1-information').show();
                }          
            } 
        });
    </script>
	<?}?>
</div>