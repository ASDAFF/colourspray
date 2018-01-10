<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="feedback">
    <?if ($arResult['ACTION'] == 'form'):?>
        <form action="<?=$arResult['SEND_URL']?>" method="POST" onsubmit="SendAndTestForm(event, this, '.feedback', 'required', 'empty')">
            <div class="feedback-wrapper">
                <div class="feedback-title"><?=$arParams['FORM_TITLE']?></div>
                <?foreach ($arResult['FIELDS'] as $arField):?>
                    <?
                        $sValue = "";
                        
                        if (!empty($_REQUEST[$arField['CODE']]))
                        {
                            if (SITE_CHARSET == 'windows-1251')
                            {
                                $sValue = iconv('UTF-8', 'WINDOWS-1251', $_REQUEST[$arField['CODE']]);
                            }
                            else
                            {
                                $sValue = $_REQUEST[$arField['CODE']];
                            }
                        }
                    ?>
                    <?if ($arField['PROPERTY_TYPE'] == 'S' && empty($arField['USER_TYPE'])):?>
                        <div class="feedback-field">
                            <div class="feedback-field-name">
                                <?=$arField['NAME']?><?=$arField['IS_REQUIRED'] == 'Y' ? ' <span class="required-mark">*</span>' : ''?>:
                            </div>
                            <div class="feedback-field-input">
                                <input type="text" class="input-text<?=$arField['IS_REQUIRED'] == 'Y' ? ' required' : ''?>" name="<?=$arField['CODE']?>" value="<?=$sValue?>" />
                            </div>
                        </div>
                    <?endif;?>
                    <?if ($arField['PROPERTY_TYPE'] == 'S' && ($arField['USER_TYPE'] == "TEXT" || $arField['USER_TYPE'] == "HTML")):?>
                        <div class="feedback-field">
                            <div class="feedback-field-name">
                                <?=$arField['NAME']?><?=$arField['IS_REQUIRED'] == 'Y' ? ' <span class="required-mark">*</span>' : ''?>:
                            </div>
                            <div class="feedback-field-input">
                                <textarea class="input-textarea<?=$arField['IS_REQUIRED'] == 'Y' ? ' required' : ''?>" name="<?=$arField['CODE']?>"><?=$sValue?></textarea>
                            </div>
                        </div>
                    <?endif;?>
                <?endforeach;?>
                <?if ($arParams['USE_CAPTCHA'] == 'Y'):?>
                <div class="feedback-field">
                    <div class="feedback-field-name">
                        <?=GetMessage('CAPTCHA_WORD')?> <span class="required-mark">*</span>:
                    </div>
                    <div class="feedback-field-image">
                        <img src="<?=$arResult['CAPTCHA']['IMAGE']?>" />
                    </div>
                    <div class="feedback-field-input">
                        <input type="hidden" name="CAPTCHA_SID" value="<?=$arResult['CAPTCHA']['SID']?>" />
                        <input type="text" class="input-text required" name="CAPTCHA_WORD" value="" />
                    </div>
                </div>
                <?endif;?>
                <div class="feedback-buttons">
                    <input class="feedback-button-gray feedback-button left" type="button" onclick="CloseForm()" value="<?=GetMessage('CLOSE_BUTTON')?>"/>
                    <input class="solid_button feedback-button right" type="submit" value="<?=$arParams['BUTTON_SEND_TEXT']?>"/>
					<div class="clearfix"></div>
					<div class="consent">
						<a href="<?=SITE_DIR?>consent" target="_blank">
							<input type="checkbox" id="consent" checked disabled>
							<label>
								<?=GetMessage('CONSENT');?>
							</label>
						</a>
					</div>
                </div>
            </div>
        </form>
    <?endif;?>
    <?if ($arResult['ACTION'] == 'send'):?>
        <div class="feedback-wrapper">
            <div class="feedback-title"><?=$arParams['FORM_TITLE']?></div>
            <div class="feedback-message">
                <?=$arParams['MESSAGE_COMPLETE']?>
            </div>
        </div>
    <?endif;?>
    <?if ($arResult['ACTION'] == 'emptyFields'):?>
        <div class="feedback-wrapper">
            <div class="feedback-title"><?=$arParams['FORM_TITLE']?></div>
            <div class="feedback-message">
                <?=$arParams['MESSAGE_EMPTY_FIELDS']?>
            </div>
        </div>
    <?endif;?>
    <?if ($arResult['ACTION'] == 'wrongCaptcha'):?>
        <div class="feedback-wrapper">
            <div class="feedback-title"><?=$arParams['FORM_TITLE']?></div>
            <div class="feedback-message">
                <?=$arParams['MESSAGE_WRONG_CAPTCHA']?>
            </div>
        </div>
    <?endif;?>
    <?if ($arResult['ACTION'] == 'error'):?>
        <div class="feedback-wrapper">
            <div class="feedback-title"><?=$arParams['FORM_TITLE']?></div>
            <div class="feedback-message">
                <?=$arParams['MESSAGE_ERROR']?>
            </div>
        </div>
    <?endif;?>
</div>