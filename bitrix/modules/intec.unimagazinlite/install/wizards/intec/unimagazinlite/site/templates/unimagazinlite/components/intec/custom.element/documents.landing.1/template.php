<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="documents landing-1">
    <?foreach ($arResult['ITEMS'] as $arDocument):?>
        <div class="documents-item">
            <div class="documents-item-wrapper">
                <div class="documents-item-image">
                    <div class="uni-image">
                        <div class="uni-aligner-vertical"></div>
                        <img src="<?=$this->GetFolder().'/images/document.png'?>" />
                    </div>
                </div>
                <div class="documents-item-information">
                    <a class="documents-item-information-name" href="<?=$arDocument['PATH']?>"><?=$arDocument['ORIGINAL_NAME']?></a>
                    <div class="documents-item-information-size"><?=GetMessage('DOCUMENT_ITEM_SIZE_CAPTION')?>: <?=number_format(($arDocument['FILE_SIZE'] / 8 / 1024), 2, '.', ' ')?> <?=GetMessage('DOCUMENT_ITEM_SIZE_DIMENSION')?>.</div>
                </div>
            </div>          
        </div>
    <?endforeach;?>
</div>