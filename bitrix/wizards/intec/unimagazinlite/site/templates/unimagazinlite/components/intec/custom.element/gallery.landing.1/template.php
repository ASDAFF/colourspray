<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<?global $options;?>
<?$sUniqueID = 'gallery'.spl_object_hash($this);?>
<?$arAdditionalPictures = array_slice($arResult['ITEMS'], 4)?>
<div class="gallery landing-1" id="<?=$sUniqueID?>">
    <div class="gallery-wrapper">
        <div class="gallery-images">
            <?foreach ($arResult['ITEMS'] as $sPicture):?>
                <div class="gallery-images-image">
                    <div class="gallery-images-image-wrapper">
                        <div class="gallery-images-image-wrapper-wrapper">
                            <a rel="galery.landing-1" class="uni-image fancy" href="<?=$sPicture?>" style="width: 100%; height: 100%;">
                                <div class="uni-aligner-vertical"></div>
                                <img src="<?=$sPicture?>" />
                            </a>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
        <div class="gallery-slider-button-left-wrapper" style="display: none;">
            <div class="gallery-slider-button uni-slider-button-small uni-slider-button-left" onclick="return $<?=$sUniqueID?>.SlideRight();">
                <div class="icon"></div>
            </div>
            <div class="uni-aligner-vertical"></div>
        </div>
        <div class="gallery-slider-button-right-wrapper" style="display: none;">
            <div class="uni-aligner-vertical"></div>
            <div class="gallery-slider-button uni-slider-button-small uni-slider-button-right" onclick="return $<?=$sUniqueID?>.SlideLeft();">
                <div class="icon"></div>
            </div>
        </div>
        <?if (!empty($arAdditionalPictures)):?>
            <div class="gallery-buttons">
                <div class="uni-indents-vertical indent-25"></div>
                <div class="gallery-buttons-more">
                    <div class="gallery-buttons-more-text"><?=GetMessage('GALLERY_BUTTONS_MORE_TEXT')?></div>
                    <div class="uni-indents-vertical indent-10"></div>
                    <div class="gallery-buttons-more-icon solid_button">
                        <div class="gallery-buttons-more-icon-picture"></div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    var $bBoxOpened = false;
                    var $oImages = $('#<?=$sUniqueID?>.gallery.landing-1 .gallery-images');
                    var $iImageHeight = $('#<?=$sUniqueID?>.gallery.landing-1 .gallery-images-image').height();
                    $oImages.css('height', $iImageHeight + 'px');
                    
                    $(window).resize(function () {
                        var $oImages = $('#<?=$sUniqueID?>.gallery.landing-1 .gallery-images');
                        var $iImageHeight = $('#<?=$sUniqueID?>.gallery.landing-1 .gallery-images-image').height();
                        
                        if ($bBoxOpened == false) {
                            $oImages.css('height', $iImageHeight + 'px');
                        } else {
                            $oImages.css('height', 'auto');
                        }
                    });
                    
                    $('#<?=$sUniqueID?>.gallery.landing-1 .gallery-buttons .gallery-buttons-more').click(function(){
                        var $oButton = $(this);
                        var $oImages = $('#<?=$sUniqueID?>.gallery.landing-1 .gallery-images');
                        var $iImageHeight = $('#<?=$sUniqueID?>.gallery.landing-1 .gallery-images-image').height();
                        
                        if ($bBoxOpened == false) {
                            $oImages.css({'display':'block', 'height':'auto'});
                            var $sHeight = $oImages.height();
                            $oImages.css('height', $iImageHeight + 'px');
                            $oImages.stop().animate({'height':$sHeight + 'px'}, 500, function(){
                                $oImages.css('height', 'auto');
                                $oButton.addClass('ui-state-active');
                            });
                            
                            $bBoxOpened = true;
                        } else {
                            $oImages.stop().animate({'height':$iImageHeight + 'px'}, 500, function(){
                                $oImages.css('height', $iImageHeight + 'px');
                                $oButton.removeClass('ui-state-active');
                            });
                            
                            $bBoxOpened = false;
                        }
                    });
                })
            </script>
        <?endif;?>
        <script type="text/javascript">
            var $<?=$sUniqueID?> = new UNISlider({
                'OFFSET': 1,
                'SLIDER': '#<?=$sUniqueID?> .gallery-images',
                'ELEMENT': '#<?=$sUniqueID?> .gallery-images .gallery-images-image',
                'OFFSET': 4,
                'ANIMATE': true,
                'ANIMATE_SPEED': 500,
                'EVENTS': {
                    'onAdaptabilityChange': function ($oSlider) {
                        <?if ($options['ADAPTIV']['ACTIVE_VALUE'] == 'Y'):?>
                            $oSlider.Settings.OFFSET = Math.round($oSlider.GetSliderWidth() / $oSlider.GetElementWidth());
                        <?endif;?>
                                        
                        if ($oSlider.Settings.OFFSET < $oSlider.GetElementsCount() && $(window).width() <= 800) {
                            $('#<?=$sUniqueID?> .gallery-slider-button-right-wrapper, #<?=$sUniqueID?> .gallery-slider-button-left-wrapper').css('display', 'block');
                            $('#<?=$sUniqueID?> .gallery-wrapper').css({'padding-left':'38px', 'padding-right':'38px'});
                        } else {
                            $('#<?=$sUniqueID?> .gallery-slider-button-right-wrapper, #<?=$sUniqueID?> .gallery-slider-button-left-wrapper').css('display', 'none');
                            $('#<?=$sUniqueID?> .gallery-wrapper').css({'padding-left':'0px', 'padding-right':'0px'});
                        }
                    }  
                },
                'ADAPTABILITY': [{
                    'WIDTH': 'DEFAULT',
                    'SETTINGS': {
                        'OFFSET': 4
                    }
                }, {
                    'WIDTH': 800,
                    'SETTINGS': {
                        'OFFSET': 2
                    }
                }, {
                    'WIDTH': 450,
                    'SETTINGS': {
                        'OFFSET': 1
                    }
                }]
            });
        </script>
    </div>
</div>