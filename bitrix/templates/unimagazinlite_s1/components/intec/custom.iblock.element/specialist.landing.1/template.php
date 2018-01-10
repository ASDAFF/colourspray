<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="specialist landing-1" style="box-sizing:border-box">
    
        
            <div class="specialist_card" >
                <div class="specialist-information">
                    <div class="specialist-information-image">
                        <?if (!empty($arResult['PICTURE'])):?>
                            <div class="uni-image" style="width: 100%; max-height: 100%; background: url('<?=$arResult['PICTURE']?>') no-repeat center; border-radius: 50%;background-size:cover">
                            </div>
                        <?endif;?>
                    </div>
                    <div class="specialist-information-information">
                        <div class="specialist-information-information-name">
                            <?=$arResult['NAME']?>
                        </div>
                        <div class="specialist-information-information-post">
                            <?=$arResult['PROPERTIES']['POST']['VALUE']?>
                        </div>
                        <?if (!empty($arResult['PROPERTIES']['PHONE']['VALUE']) || !empty($arResult['PROPERTIES']['SKYPE']['VALUE'])):?>
                            <div class="uni-indents-vertical indent-20"></div>
                            <div class="specialist-information-information-delimiter"></div>
                            <div class="uni-indents-vertical indent-15"></div>
                            <?if (!empty($arResult['PROPERTIES']['PHONE']['VALUE'])):?>
                                <div class="specialist-information-information-phone">
                                    <?=GetMessage('SPECIALIST_INFORMATION_PHONE')?>: <?=$arResult['PROPERTIES']['PHONE']['VALUE']?>
                                </div>
                            <?endif;?>
                            <?if (!empty($arResult['PROPERTIES']['SKYPE']['VALUE'])):?>
                                <div class="specialist-information-information-skype">
                                    <?=GetMessage('SPECIALIST_INFORMATION_SKYPE')?>: <?=$arResult['PROPERTIES']['SKYPE']['VALUE']?>
                                </div>
                            <?endif;?>
                        <?endif;?>
                    </div>
                </div>
            </div>
            
                <?if ($arParams['DISPLAY_NOTIFICATION'] == "Y"):?>
                    <div class="specialist-question">
                        <div class="specialist-question-caption">
                            <?=GetMessage('SPECIALIST_QUESTION_CAPTION')?>
                        </div>
                        <div class="uni-indents-vertical indent-10"></div>
                        <div class="specialist-question-text">
                            <?=GetMessage('SPECIALIST_QUESTION_TEXT')?>
							
                        </div>
                         <?if ($arParams['DISPLAY_NOTIFICATION_BUTTON'] == "Y"):?>
                            <div class="uni-indents-vertical indent-25"></div>
                            <a class="uni-button solid_button"<?=!empty($arParams['NOTIFICATION_BUTTON_ID']) ? ' id="'.$arParams['NOTIFICATION_BUTTON_ID'].'"' : ''?>>
                                <?=GetMessage('SPECIALIST_QUESTION_BUTTON')?>
                            </a>
                        <?endif;?>
                    </div>
                <?endif;?>
            
   
</div>