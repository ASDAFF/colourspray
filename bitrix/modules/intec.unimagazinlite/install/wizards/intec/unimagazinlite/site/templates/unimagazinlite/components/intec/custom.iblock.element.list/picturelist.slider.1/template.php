<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<?$sUniqueID = 'picturelist_slider_1'.spl_object_hash($this);?>
<div class="picturelist-slider-1" id="<?=$sUniqueID?>">
    <div class="picturelist-slider-1-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arElement):?>
            <?
                $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
			    $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
            <div class="picturelist-slider-1-element uni-25">
                <div class="picturelist-slider-1-element-wrapper" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                    <div class="picturelist-slider-1-image" style="padding-top: <?=$arParams['PICTURE_BLOCK_HEIGHT']?>;">
                        <div class="picturelist-slider-1-image-wrapper uni-image">
                            <div class="uni-aligner-vertical"></div>
                            <img src="<?=$arElement['PICTURE']?>" alt="<?=$arElement['NAME']?>" />
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
    <div class="picturelist-slider-1-points">
        <div class="picturelist-slider-1-points-wrapper">
        </div>
    </div>
    <script type="text/javascript">
        var $<?=$sUniqueID?> = new UNISlider({
                'OFFSET': 4,
                'SLIDER': '#<?=$sUniqueID?> .picturelist-slider-1-wrapper',
                'ELEMENT': '#<?=$sUniqueID?> .picturelist-slider-1-wrapper .picturelist-slider-1-element',
                'ANIMATE': true,
                'ANIMATE_SPEED': 400,
                'EVENTS': {
                    'onAdaptabilityChange': function ($oSlider) {
                        $oSlider.Settings.OFFSET = Math.round($oSlider.GetSliderWidth() / $oSlider.GetElementWidth());
                        
                        var $oListenerContainer = $('#<?=$sUniqueID?> .picturelist-slider-1-points .picturelist-slider-1-points-wrapper');
                        var $iDisplayedItems = $oSlider.Settings.OFFSET;
                        var $iCountItems = $oSlider.GetElementsCount();
                        var $iListenerButtons = Math.floor($iCountItems / $iDisplayedItems);
                        
                        if ($iDisplayedItems * 2 <= $iCountItems) {
                            $('#<?=$sUniqueID?> .picturelist-slider-1-points').show();
                        } else {
                            $('#<?=$sUniqueID?> .picturelist-slider-1-points').hide();
                        }
                        
                        $oListenerContainer.empty();
                        if ($iListenerButtons > 0) {
                            var $iCurrentPage = Math.floor($oSlider.GetCurrentSlide() / $oSlider.Settings.OFFSET);
                            
                            for (var $i = 0; $i < $iListenerButtons; $i++) {
                                var $iNumber = $i * $iDisplayedItems;
                                $('<div class="picturelist-slider-1-point" slide="' + $iNumber + '"></div>').click(function() {
                                    $oSlider.SlideTo($(this).attr('slide'));
                                }).appendTo($oListenerContainer)
                            }
                            
                            $oListenerContainer.children()
                                .removeClass('picturelist-slider-1-point-selected')
                                .eq($iCurrentPage)
                                .addClass('picturelist-slider-1-point-selected');
                        }
                    },
                    'onAfterSlide': function ($oSlider, $oSettings) {
                            var $oListenerContainer = $('#<?=$sUniqueID?> .picturelist-slider-1-points .picturelist-slider-1-points-wrapper');
                            var $iCurrentPage = Math.floor($oSettings.SLIDE.NEXT / $oSlider.Settings.OFFSET);
                            
                            $oListenerContainer.children()
                                .removeClass('picturelist-slider-1-point-selected')
                                .eq($iCurrentPage)
                                .addClass('picturelist-slider-1-point-selected');
                    }            
                } 
            });
    </script>
</div>