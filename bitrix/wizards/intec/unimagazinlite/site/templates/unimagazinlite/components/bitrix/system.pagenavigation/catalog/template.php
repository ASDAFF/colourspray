<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$frame = $this->createFrame()->begin()?>
<?
	$strNavQueryStringFromResult = $arResult["NavQueryString"];
	$strNavQueryStringFromResult = str_replace('ajax_catalog_load=N','',$strNavQueryStringFromResult);
	$strNavQueryStringFromResult = str_replace('ajax_paginator_load=Y','',$strNavQueryStringFromResult);
	$strNavQueryString = ($arResult["NavQueryString"] != "" ? $strNavQueryStringFromResult."&amp;" : "");
	$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$strNavQueryStringFromResult : "");
?>
<?if ($arParams['PAGER_SHOW_ALWAYS'] || $arResult['NavPageCount'] > 1):?>
    <div class="paginator">
        <div class="static">
            <div class="buttons">
                <?if ($arResult["NavPageNomer"] > 1):?>
                	<?if($arResult["bSavePage"]):?>
                		<?/*?><a class="uni-button solid_button button" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_begin")?></a><?*/?>
                		<a class="uni-slider-button uni-slider-button-left" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><div class="icon"></div><?//=GetMessage("nav_prev")?></a>
                	<?else:?>
                		<?/*?><a class="uni-button solid_button button" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("nav_begin")?></a><?*/?>
                        <?if ($arResult["NavPageNomer"] > 2):?>
                			<a class="uni-slider-button uni-slider-button-left" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><div class="icon"></div><?//=GetMessage("nav_prev")?></a>
                        <?else:?>
                			<a class="uni-slider-button uni-slider-button-left" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><div class="icon"></div><?//=GetMessage("nav_prev")?></a>
                		<?endif?>
                	<?endif?>
                <?else:?>
                <?endif?>
                
                <?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
            		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
            			<div class="uni-button button ui-state-current"><?=$arResult["nStartPage"]?></div>
            		<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
            			<a class="uni-button button" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
            		<?else:?>
            			<a class="uni-button button" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
            		<?endif?>
            		<?$arResult["nStartPage"]++?>
            	<?endwhile?>
            
            	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            		<a class="uni-slider-button uni-slider-button-right" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><div class="icon"></div><?//=GetMessage("nav_next")?></a>
            		<?/*?><a class="uni-button solid_button button" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=GetMessage("nav_end")?></a><?*/?>
            	<?else:?>
            	<?endif?>
            </div>
        </div>
    </div>
<?endif?>
<?$frame->end()?>