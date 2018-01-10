<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<?if (!empty($arResult['ELEMENTS'])) {?>
    <div class="banners-1">
        <div class="banners-1-wrapper uni_parent_col">
            <?foreach ($arResult['ELEMENTS'] as $arElement):?>
                <div class="banners-1-banner uni_col uni-33">
                    <div class="banners-1-banner-wrapper">
                        <div class="banners-1-image">
                            <div class="banners-1-image-wrapper uni-image">
                                <div class="uni-indents-vertical"></div>
                                <img src="<?=$arElement['PICTURE']?>" />
                            </div>
                        </div>
                        <div class="banners-1-text">
                            <div class="banners-1-name">
                                <?=htmlspecialcharsbx($arElement['NAME']);?>
                            </div>
                            <div class="banners-1-description">
                            
                            </div>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
<?}?>