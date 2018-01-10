<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if(is_array($arResult["ITEMS"])&&!empty($arResult["ITEMS"])){?>
    <div class="main_news_pictures">
        <?$href = str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"]);?>
        <h3 class="header_grey news_title"><?=$arResult["NAME"]?></h3>
        <div class="see_all"><a href="<?=$href?>"><?=GetMessage("ALL_NEWS_PICTURES")?></a></div>
        <div class="clear"></div>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="<?=!$i?'border:0;':''?>">
                <?if(is_array($arItem["PREVIEW_PICTURE"])){?>
                    <?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>100, 'height'=>100));
                    $src = $file['src'];?>
                    <div class="left_col">
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="img_review" style='display:block;background-image:url(<?=$src?>)'></a>
                    </div>
                <?}?>
                <div class="right_col">
                    <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                        <div class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
                    <?endif?>
                    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <a class="name_news" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo TruncateText($arItem["NAME"],100)?></a>
                    <?endif;?>
                    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <div class="preview">
                            <?echo TruncateText($arItem["PREVIEW_TEXT"],150);?>
                        </div>
                    <?endif;?>
                </div>
                <div class="clear"></div>
            </div>
        <?endforeach;?>
        <div class="clearfix"></div>
    </div>
<?}?>

