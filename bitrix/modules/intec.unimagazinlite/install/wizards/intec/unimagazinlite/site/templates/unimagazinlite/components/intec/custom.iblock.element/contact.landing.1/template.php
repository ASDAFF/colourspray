<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="contact landing-1">
    <div class="contact-information">
        <?if (!empty($arResult['PROPERTIES']['PHONES']['VALUE']['0'])):?>
            <div class="contact-information-phone">
                <div class="contact-information-phone-icon"></div>
                <div class="contact-information-field-information">
                    <div class="contact-information-field-information-caption">
                        <?=GetMessage('CONTACT_INFORMATION_PHONE_CAPTION')?>:
                    </div>
                    <div class="contact-information-field-information-value">
                        <?=$arResult['PROPERTIES']['PHONES']['VALUE']['0']?>
                    </div>
                </div>
            </div>
        <?endif;?>
        <?if (!empty($arResult['PROPERTIES']['EMAIL']['VALUE'])):?>
            <div class="contact-information-mail">
                <div class="contact-information-mail-icon"></div>
                <div class="contact-information-field-information">
                    <div class="contact-information-field-information-caption">
                        <?=GetMessage('CONTACT_INFORMATION_MAIL_CAPTION')?>:
                    </div>
                    <div class="contact-information-field-information-value">
                        <?=$arResult['PROPERTIES']['EMAIL']['VALUE']?>
                    </div>
                </div>
            </div>
        <?endif;?>
        <?if (!empty($arResult['PROPERTIES']['ADDRESSLOCALITY']['VALUE'])):?>
            <div class="contact-information-address">
                <div class="contact-information-address-icon"></div>
                <div class="contact-information-field-information">
                    <div class="contact-information-field-information-caption">
                        <?=GetMessage('CONTACT_INFORMATION_ADDRESS_CAPTION')?>:
                    </div>
                    <div class="contact-information-field-information-value">
                        <?=$arResult['PROPERTIES']['ADDRESSLOCALITY']['VALUE']?>
                    </div>
                </div>
            </div>
        <?endif;?>
        <?if ($arParams['DISPLAY_BUTTON'] == "Y"):?>
            <div class="contact-information-button">
                <a 
                    class="uni-button solid_button<?=!empty($arParams['BUTTON_CLASS']) ? ' '.$arParams['BUTTON_CLASS'] : ''?>"
                    <?=!empty($arParams['BUTTON_ID']) ? 'id="'.$arParams['BUTTON_ID'].'"' : ''?>
                    <?=!empty($arParams['BUTTON_HREF']) ? 'href="'.$arParams['BUTTON_HREF'].'"' : ''?>
                ><?=$arParams['BUTTON_TEXT']?></a>
            </div>
        <?endif;?>
    </div>
</div>