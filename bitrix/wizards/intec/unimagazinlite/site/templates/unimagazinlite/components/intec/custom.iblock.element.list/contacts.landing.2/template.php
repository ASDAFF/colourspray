<div class="contacts landing-1">
    <div class="contacts-contacts">
        <div class="contacts-contacts-wrapper">
            <div class="contacts-contacts-wrapper-wrapper">
                <?foreach ($arResult['ELEMENTS'] as $arContact):?>
                    <div class="contacts-contacts-contact">
                        <div class="contacts-contacts-contact-field">
                            <div class="contacts-contacts-contact-field-icon contacts-contacts-contact-field-icon-address"></div>
                            <div class="contacts-contacts-contact-field-text address" style="max-height: 60px;">
								<?=$arContact['PROPERTIES']['POSTALCODE']['VALUE']?> 
								<?=$arContact['PROPERTIES']['ADDRESSLOCALITY']['VALUE']?> 
								<?=$arContact['PROPERTIES']['STREETADDRESS']['VALUE']?>
                            </div>
                        </div>
                        <div class="contacts-contacts-contact-field">
							<?if (!empty($arContact['PROPERTIES']['PHONES']['VALUE'][0])):?>
                                <div class="contacts-contacts-contact-field-text" style="height: 20px;">
                                    <?=$arContact['PROPERTIES']['PHONES']['VALUE'][0]?>
                                </div>
							<?endif;?>
							<?if (!empty($arContact['PROPERTIES']['EMAIL']['VALUE'])):?>
								<br/>
								<div class="contacts-contacts-contact-field-text" style="height: 20px;">
									<?=$arContact['PROPERTIES']['EMAIL']['VALUE']?>
								</div>
							<?endif;?>
                        </div>
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
    			  "MAP_WIDTH" => "600",
    			  "MAP_HEIGHT" => "600",
    			  "CONTROLS" => Array("TOOLBAR", "ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
    			  "OPTIONS" => Array(/*"ENABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", */"ENABLE_DRAGGING"),
    			  "MAP_ID" => ""
    		   )
    		);?>
        </div>
    </div>
</div>