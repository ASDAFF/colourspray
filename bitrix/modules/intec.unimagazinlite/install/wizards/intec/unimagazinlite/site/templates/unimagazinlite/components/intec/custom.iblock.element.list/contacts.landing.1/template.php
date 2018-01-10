<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="contacts landing-1">
    <div class="contacts-contacts">
        <div class="contacts-contacts-wrapper">
            <div class="contacts-contacts-wrapper-wrapper">
                <?foreach ($arResult['ELEMENTS'] as $arContact):?>
                    <?
                        $sListPageUrl = $arContact['LIST_PAGE_URL'];
        			    $this->AddEditAction($arContact['ID'], $arContact['EDIT_LINK'], CIBlock::GetArrayByID($arContact["IBLOCK_ID"], "ELEMENT_EDIT"));
        			    $this->AddDeleteAction($arContact['ID'], $arContact['DELETE_LINK'], CIBlock::GetArrayByID($arContact["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        			?>
                    <div class="contacts-contacts-contact" id="<?=$this->GetEditAreaId($arContact['ID']);?>">
                        <div class="contacts-contacts-contact-city">
                            <?=GetMessage('CONTACTS_CONTACTS_CONTACT_CITY').' '.$arContact['PROPERTIES']['ADDRESSLOCALITY']['VALUE']?>
                        </div>
                        <div class="contacts-contacts-contact-delimiter"></div>
                        <div class="contacts-contacts-contact-field">
                            <div class="contacts-contacts-contact-field-icon contacts-contacts-contact-field-icon-address"></div>
                            <div class="contacts-contacts-contact-field-text" style="max-height: 60px;">
                                <?=$arContact['PROPERTIES']['STREETADDRESS']['VALUE']?>
                            </div>
                        </div>
                        <div class="contacts-contacts-contact-delimiter"></div>
                        <?if (!empty($arContact['PROPERTIES']['PHONES']['VALUE'][0])):?>
                            <div class="contacts-contacts-contact-field">
                                <div class="contacts-contacts-contact-field-icon contacts-contacts-contact-field-icon-phone"></div>
                                <div class="contacts-contacts-contact-field-text" style="height: 20px;">
                                    <?=$arContact['PROPERTIES']['PHONES']['VALUE'][0]?>
                                </div>
                            </div>
                        <?endif;?>
                        <?if (!empty($arContact['PROPERTIES']['EMAIL']['VALUE'])):?>
                            <div class="contacts-contacts-contact-field">
                                <div class="contacts-contacts-contact-field-icon contacts-contacts-contact-field-icon-mail"></div>
                                <div class="contacts-contacts-contact-field-text" style="height: 20px;">
                                    <?=$arContact['PROPERTIES']['EMAIL']['VALUE']?>
                                </div>
                            </div>
                        <?endif;?>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
    <div class="contacts-map">
        <div class="contacts-map-wrapper">
            <?$APPLICATION->IncludeComponent(
    		   "bitrix:map.yandex.view",
    		   "",
    		   Array(
    			  "INIT_MAP_TYPE" => "MAP",
    			  "MAP_DATA" => $arResult['MAP_DATA'],
    			  "MAP_WIDTH" => "350",
    			  "MAP_HEIGHT" => "350",
    			  "CONTROLS" => Array("TOOLBAR", "ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
    			  "OPTIONS" => Array('ENABLE_DRAGGING'),
    			  "MAP_ID" => ""
    		   ),
               false,
               array('HIDE_ICONS' => 'Y')
    		);?>
        </div>
    </div>
</div>