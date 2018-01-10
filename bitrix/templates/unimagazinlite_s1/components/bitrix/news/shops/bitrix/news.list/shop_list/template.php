<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<ul class="addres">
<?foreach($arResult["ITEMS"] as $arItem):?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])){
        $file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>290, 'height'=>130),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
        $src=$file['src'];
    }else{
        $src=SITE_DIR."images/no-img.jpg";
    }?>
	<li class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$src?>" height="130"  alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a>
			<?else:?>
				<img src="<?=$src?>" height="130"  alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"  />
			<?endif;?>
		<?endif?>
		<?/*if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br />
		<?endforeach;*/?>
        <?if($arItem["DISPLAY_PROPERTIES"]["ADRESS"]){?>
            <div class="adr">
              <?=$arItem["DISPLAY_PROPERTIES"]["ADRESS"]["DISPLAY_VALUE"]?>
            </div>
        <?}?>
        <?if($arItem["DISPLAY_PROPERTIES"]["PHONE"]){?>
            <div class="">
                <b><?=GetMessage('TEL')?> </b><?=$arItem["DISPLAY_PROPERTIES"]["PHONE"]["DISPLAY_VALUE"]?>
            </div>
        <?}?>
        <?if($arItem["DISPLAY_PROPERTIES"]["EMAIL"]){?>
            <div class="mail_to">
			<a href="mailto:<?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["DISPLAY_VALUE"]?>">
              	<?=$arItem["DISPLAY_PROPERTIES"]["EMAIL"]["DISPLAY_VALUE"]?></a>
            </div>
        <?}?>
        <?/*foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

			<?=$arProperty["NAME"]?>
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			<br />
		<?endforeach;*/?>
	</li>
<?endforeach;?>
</ul>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
