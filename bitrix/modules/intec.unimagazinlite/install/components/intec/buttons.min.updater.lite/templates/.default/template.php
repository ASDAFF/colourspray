<?$this->setFrameMode(true)?>
<?$frame = $this->createFrame()->begin()?>
<script type="text/javascript">
    if (window.frameCacheVars !== undefined) 
    {
        BX.addCustomEvent("onFrameDataReceived" , function(json) {
            ButtonsMinUpdaterLite();
        });
    } else {
        BX.ready(function() {
            ButtonsMinUpdaterLite();
        });
    }
    
    function ButtonsMinUpdaterLite() {
        <?if (!empty($arParams['COMPARE_ADD_SELECTOR'])):?>
            $('<?=$arParams['COMPARE_ADD_SELECTOR']?>').show();
        <?endif;?>
        <?if (!empty($arParams['COMPARE_ADDED_SELECTOR'])):?>
            $('<?=$arParams['COMPARE_ADDED_SELECTOR']?>').hide();
        <?endif;?>
		<?foreach ($arResult['COMPARE'] as $arCompare):?>
            $('<?=$arCompare['ADD_SELECTOR']?>').hide();
            $('<?=$arCompare['ADDED_SELECTOR']?>').show();
        <?endforeach;?>
		
		<?if (!empty($arParams['BASKET_ADD_SELECTOR'])):?>
            $('<?=$arParams['BASKET_ADD_SELECTOR']?>').show();
        <?endif;?>
        <?if (!empty($arParams['BASKET_ADDED_SELECTOR'])):?>
            $('<?=$arParams['BASKET_ADDED_SELECTOR']?>').hide();
        <?endif;?>
		<?foreach ($arResult['BASKET'] as $arBasket):?>
            $('<?=$arBasket['ADD_SELECTOR']?>').hide();
            $('<?=$arBasket['ADDED_SELECTOR']?>').show();
        <?endforeach;?>
    }
</script>
<?$frame->end()?>