<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if(is_array($arResult["ITEMS"])){?>
    <div class="main_articles standart_block">
        <?$href = str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"]);?>
        <div class="header_grey left"><?=$arResult["NAME"]?></div>
        <a class="all_news left" href="<?=$href?>"><?=GetMessage("ALL_ARTICLES")?></a>
        <div class="clear"></div>
        <?$i=0?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="news-item clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>" <?=!$i?"style=border-top:0":""?>>

                <?if($arParams["DISPLAY_PREVIEW_PICTURE"]!="N" && $arItem["PREVIEW_PICTURE"]):?>
                    <div class="picture-block">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="picture" alt="<?=$arItem["NAME"]?>">
                    </div>
                <?endif;?>
                <div class="text-block">
                    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                            <a class="name_news" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
                        <?else:?>
                            <?echo $arItem["NAME"]?>
                        <?endif;?>
                    <?endif;?>
                </div>


                <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <div class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
                <?endif?>
            </div>
            <?$i++;?>
        <?endforeach;?>
    </div>
<?}?>

