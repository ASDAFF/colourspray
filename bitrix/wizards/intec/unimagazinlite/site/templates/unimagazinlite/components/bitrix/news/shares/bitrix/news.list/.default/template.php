<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?
if (count($arResult["ITEMS"]) < 1)
	return;
?>
<div class="shares">
    <?$frame = $this->createFrame()->begin()?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
        	<?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        	    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        	?>
        	<?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])||!empty($arItem["DETAIL_PICTURE"]["SRC"])){
        		if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])){
        			$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>467, 'height'=>248),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
        		}else{
        			$file = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"],array('width'=>467, 'height'=>248),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
        		}
        		$src=$file['src'];
        	}else{
        		$src=SITE_TEMPLATE_PATH."/images/noimg_quadro.jpg";
        	}?>
        	<div class="share" >
                <div class="wrapper hover_shadow" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            		<a class="image" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <div class="uni-aligner-vertical"></div>
                        <img src="<?=$src?>" />		
            		</a>
            		<div class="information">
                        <div class="uni-indents-vertical indent-15"></div>
                        <div class="hide-wrapper">
                			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="caption"><?=$arItem["NAME"];?></a>
                            <?if (!empty($arItem["DATE_ACTIVE_FROM"])):?>
                                <div class="date-start"><?=$arItem["DATE_ACTIVE_FROM"]?></div>
                            <?endif;?>
                            <div class="uni-indents-vertical indent-15"></div>
                			<div class="description uni-text-default">
                				<?=$arItem["PREVIEW_TEXT"]?>
                			</div>
                        </div>
                        <div class="uni-indents-vertical indent-15"></div>
                        <?if (!empty($arItem["DATE_ACTIVE_TO"])):?>
                            <div class="date-end"><?=GetMessage("NEWS_SHARES")?> <?=$arItem["DATE_ACTIVE_TO"]?></div>
                        <?endif;?>
                        <a class="detail" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=GetMessage("SHARES_DETAIL")?></a>
            		</div>
                </div>
        	</div>
            <div class="clear"></div>
        <?endforeach;?>
    <?$frame->end()?>
</div>
<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>