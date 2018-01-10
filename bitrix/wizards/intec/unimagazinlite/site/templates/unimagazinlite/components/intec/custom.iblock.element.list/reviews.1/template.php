<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<div class="reviews-1">
    <div class="reviews-1-wrapper">
        <?foreach ($arResult['ELEMENTS'] as $arElement):?>
            <?
                $sListPageUrl = $arElement['LIST_PAGE_URL'];
			    $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
			    $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
            <div class="reviews-1-review uni-33">
                <div class="reviews-1-review-wrapper" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                    <div class="reviews-1-border">
                        <div class="reviews-1-image">
                            <div class="reviews-1-image-wrapper uni-image">
                                <div class="uni-aligner-vertical"></div>
                                <img src="<?=$arElement['PICTURE']?>" alt="<?=$arElement['NAME']?>" />
                            </div>
                        </div>
                        <div class="reviews-1-information">
                            <div class="reviews-1-name"><?=$arElement['PROPERTIES']['autor']['VALUE']?></div>
                            <div class="reviews-1-company"><?=$arElement['PROPERTIES']['company']['VALUE']?></div>
                            <div class="reviews-1-description"><?=$arElement['PREVIEW_TEXT']?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
    <?if (!empty($sListPageUrl)):?>
        <div class="reviews-1-buttons">
            <a href="<?=$sListPageUrl?>" class="uni-button uni-button-gray reviews-1-button-all">
                <?=GetMessage('REVIEWS_BUTTONS_SHOW_ALL')?>
            </a>
        </div>
    <?endif;?>
</div>