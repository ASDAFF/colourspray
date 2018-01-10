<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="characteristics landing-1">
    <div class="characteristics-table_wrapper">
        <table width="100%" cellspadding="0" cellsspacing="0" border="0" class="characteristics-table">
            <?$arMainElements = array_slice($arResult['ELEMENTS'], 0, $arParams['MAIN_ELEMENTS_COUNT'])?>
            <?$arAdditionalElements = array_slice($arResult['ELEMENTS'], $arParams['MAIN_ELEMENTS_COUNT'])?>
            <?$bEven = true?>
            <?foreach ($arMainElements as $iIndex => $arElement):?>
                <tr<?=$bEven ? ' class="even"' : ''?>>
                    <td><?=$arElement['PROPERTIES']['NAME']['VALUE']?></td>
                    <td><?=$arElement['PROPERTIES']['VALUE']['VALUE']?></td>
                </tr>
                <?$bEven = !$bEven?>
            <?endforeach;?>
            <?if (!empty($arAdditionalElements)):?>
                <?foreach ($arAdditionalElements as $iIndex => $arElement):?>
                    <tr class="characteristics-table-tr-hideable<?=$bEven ? ' even' : ''?>">
                        <td><?=$arElement['PROPERTIES']['NAME']['VALUE']?></td>
                        <td><?=$arElement['PROPERTIES']['VALUE']['VALUE']?></td>
                    </tr>
                    <?$bEven = !$bEven?>
                <?endforeach;?>
            <?endif;?>
        </table>
    </div>
    <?if (!empty($arAdditionalElements)):?>
        <div class="uni-indents-vertical indent-25"></div>
        <div class="characteristics-buttons">
            <div class="characteristics-buttons-more">
                <div class="characteristics-buttons-more-text">
                    <span class="characteristics-buttons-more-text-span"><?=GetMessage("CHARACTERISTICS_BUTTONS_MORE_TEXT_ALL")?></span>
					<div class="characteristics-buttons-more-icon">
						<div class="characteristics-buttons-more-icon-picture">
						</div>
					</div>
                </div>
				
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('.characteristics.landing-1 .characteristics-buttons .characteristics-buttons-more').click(function(){
                            var $oAdditionalButton = $(this);
                            var $oAdditionalCharacteristics = $(this).parent().parent().find('.characteristics-table .characteristics-table-tr-hideable');
                            
                            if ($oAdditionalCharacteristics.css('display') == 'none')
                            {
                                $oAdditionalCharacteristics.css('display', 'table-row');
                                $oAdditionalButton.addClass('ui-state-active');
                            }
                            else
                            {
                                $oAdditionalCharacteristics.css('display', 'none');
                                $oAdditionalButton.removeClass('ui-state-active');
                            }
							if ($('.characteristics.landing-1 .characteristics-buttons .characteristics-buttons-more').hasClass('ui-state-active')) {
								$('.characteristics.landing-1 .characteristics-buttons .characteristics-buttons-more .characteristics-buttons-more-text-span').text('<?=GetMessage("CHARACTERISTICS_BUTTONS_MORE_TEXT")?>');
							} else {
								$('.characteristics.landing-1 .characteristics-buttons .characteristics-buttons-more .characteristics-buttons-more-text-span').text('<?=GetMessage("CHARACTERISTICS_BUTTONS_MORE_TEXT_ALL")?>');
							}
                        })
                    })
                </script>
            </div>
        </div>
    <?endif;?>
</div>