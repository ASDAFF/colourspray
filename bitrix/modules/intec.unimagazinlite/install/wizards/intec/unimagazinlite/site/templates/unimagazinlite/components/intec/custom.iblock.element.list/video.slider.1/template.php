<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="video slider-1" id="<?=$arParams['SLIDER_ID']?>">
    <div class="video-slider">
        <table class="video-slider-table" width="100%" border="0" cellspadding="0" cellsspacing="0">
            <tr>
                <?if (count($arResult['ELEMENTS']) > 1):?>
                    <td>
                        <div class="uni-slider-button uni-slider-button-left" id="scroll-left">
                            <div class="icon"></div>
                        </div>
                    </td>
                <?endif;?>
                <td style="position: relative; width: 100%;">
                    <div class="video-slider-pages">
                        <?foreach ($arResult['ELEMENTS'] as $arVideo):?>
                            <div class="video-slider-pages-page">
                                <div class="video-slider-pages-page-video">
                                    <iframe style="width: 100%; height: 100%;" src="<?=$arVideo['PROPERTIES']['LINK']['VALUE']?>" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="video-slider-pages-page-information">
                                    <div class="video-slider-pages-page-information-name">
                                        <?=$arVideo['NAME']?>
                                    </div>
                                    <?if (!empty($arVideo['PREVIEW_TEXT'])):?>
                                        <div class="video-slider-pages-page-information-description">
                                            <?=$arVideo['PREVIEW_TEXT']?>
                                        </div>
                                    <?endif;?>
                                </div>
                            </div>
                        <?endforeach;?>
                    </div>
                </td>
                <?if (count($arResult['ELEMENTS']) > 1):?>
                    <td>
                        <div class="uni-slider-button uni-slider-button-right" id="scroll-right">
                            <div class="icon"></div>
                        </div>
                    </td>
                <?endif;?>
            </tr>
        </table>
        <script>
            $(document).ready(function(){
                var $oSlider = $('#<?=$arParams['SLIDER_ID']?>');
                var $oPages = $oSlider.find('.video-slider .video-slider-table .video-slider-pages .video-slider-pages-page');
                var $oScrollLeft = $oSlider.find('#scroll-left');
                var $oScrollRight = $oSlider.find('#scroll-right');
                var $iCountPages = $oPages.size();
                var $iCurrentPage = 0;
                
                $oScrollLeft.click(function(){
                    $iCurrentPage--;
                    UpdateSlider();
                });
                
                $oScrollRight.click(function(){
                    $iCurrentPage++;
                    UpdateSlider();
                });
                
                function UpdateSlider()
                {
                    if ($iCurrentPage >= $iCountPages) {
                        $iCurrentPage = 0;
                    }
                    
                    if ($iCurrentPage < 0) {
                        $iCurrentPage = 0;
                    }
                    
                    $oPages.stop().animate({'opacity':'0'}, 200, function(){
                        $oPages.css({'display':'none'});
                        $oPages.eq($iCurrentPage).css({'display':'block', 'opacity':'0'}).stop().animate({'opacity':'1.0'}, 200);
                    });
                }
                
                UpdateSlider();
            })
        </script>
    </div>
</div>