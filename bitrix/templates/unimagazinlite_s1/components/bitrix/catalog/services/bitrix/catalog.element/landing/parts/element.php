<?if ($sCurrentElement == 'CONTACT'):?>
    <?if ($arData['CONTACT']['SHOW']):?>
        <div class="uni-indents-vertical indent-45"></div>
        <div class="service-section">
            <?$APPLICATION->IncludeComponent("intec:custom.iblock.element", "contact.landing.1", Array(
            	   "IBLOCK_ELEMENT_ID" => $arData['CONTACT']['VALUE'],
                   "USE_DETAIL_PICTURE" => "N",
                   "USE_PREVIEW_PICTURE" => "N",
                   "DISPLAY_BUTTON" => "Y",
                   "BUTTON_CLASS" => 'orderService',
                   "BUTTON_TEXT" => GetMessage('SERVICE_HEADER_ORDER_BUTTON')
            	),
            	false
            );?>
        </div>
    <?endif;?>
<?endif;?>