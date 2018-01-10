<div id="tabs" class="uni-tabs uni-tabs-up" style="position: static;">
    <ul class="tabs">
        <?if (strlen($arResult['DETAIL_TEXT']) > 0):?>
            <li class="tab"><a href="#description"><?=GetMessage("PRODUCT_DESCRIPTION")?></a></li>
        <?endif;?>
        <?if (count($properties) > 0 && is_array($properties)):?>
            <li class="tab"><a href="#properties"><?=GetMessage("PRODUCT_PROPERTIES")?></a></li>
        <?endif;?>
        <?if(is_numeric($arParams['REVIEWS_IBLOCK_ID'])):?>
            <li class="tab"><a href="#reviews"><?=GetMessage("PRODUCT_REVIEWS")?></a></li>
        <?endif;?>
        <?if (!empty($arResult['PROPERTIES']['INSTRUCTIONS']['VALUE'])):?>
            <li class="tab"><a href="#documents"><?=GetMessage("PRODUCT_DOCUMENTS")?></a></li>
        <?endif;?>
        <div class="bottom-line-up"></div>
    </ul>
    <div class="clear"></div>
    <?if (strlen($arResult['DETAIL_TEXT']) > 0): // Детальное описание?>
        <div id="description" class="description uni-text-default">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    <?endif;?>
    <?if (count($properties) > 0 && is_array($properties)):?>
        <div id="properties" class="item_description">
            <div class="properties">
                <?foreach ($properties as $property):?>
                    <div class="property">
                        <div class="name">
                            <?=$property['NAME']?>
                        </div>
                        <?if (!is_array($property['VALUE'])) {?>
                            <div class="value">
                                <?=$property['DISPLAY_VALUE']?>
                            </div>
                        <?} else {?>
                            <div class="value">
                                <?=implode(', ', $property['VALUE'])?>
                            </div>
                        <?}?>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    <?endif;?>
    <?if(is_numeric($arParams['REVIEWS_IBLOCK_ID'])):?>
        <div id="reviews" class="item_description">
            <?$APPLICATION->IncludeComponent(
                "intec:reviews",
                "reviews",
                array(
                    "IBLOCK_TYPE" => "reviews",
                    "IBLOCK_ID" => $arParams['REVIEWS_IBLOCK_ID'],
                    "ELEMENT_ID" => $arResult['ID'],
                    "DISPLAY_REVIEWS_COUNT" => $arParams['MESSAGES_PER_PAGE']
                ),
                $component
            );?>
        </div>
    <?endif;?>
    <?if (!empty($arResult['PROPERTIES']['INSTRUCTIONS']['VALUE'])):?>
        <div id="documents" class="item_description">
            <?include('Documents.php')?>
        </div>
    <?endif;?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#tabs").tabs({
                show: function(event, ui) { $(window).trigger('resize'); }
            });
        })
    </script>
</div>