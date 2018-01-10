<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<?
    $iElementsCount = count($arResult['ELEMENTS']);
    if ($iElementsCount <= 5) $sElementStyle = 'picturelist-picture-'.count($arResult['ELEMENTS']);
    if ($iElementsCount >= 6) $sElementStyle = 'picturelist-picture-5';
?>
<div class="picturelist landing-1">
    <div class="picturelist-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arPicture):?>
            <div class="picturelist-picture<?=' '.$sElementStyle?>">
                <?if ($arParams['USE_LINK_TO_ELEMENTS'] == 'Y'):?>
                    <a class="picturelist-picture-image" href="<?=$arPicture['DETAIL_PAGE_URL']?>" style="padding-top: <?=$arParams['PICTURE_BLOCK_HEIGHT']?>;">
                        <div class="picturelist-picture-image-wrapper">
                            <div class="uni-image">
                                <div class="uni-aligner-vertical"></div>
                                <img src="<?=$arPicture['PICTURE']?>" />
                            </div>
                        </div>
                    </a>
                <?else:?>
                    <div class="picturelist-picture-image" style="padding-top: <?=$arParams['PICTURE_BLOCK_HEIGHT']?>;">
                        <div class="picturelist-picture-image-wrapper">
                            <div class="uni-image">
                                <div class="uni-aligner-vertical"></div>
                                <img src="<?=$arPicture['PICTURE']?>" />
                            </div>
                        </div>
                    </div>
                <?endif;?>
            </div>
        <?endforeach;?>
    </div>
</div>