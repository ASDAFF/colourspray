<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?$frame = $this->createFrame()->begin()?>
    <?foreach($arResult["ITEMS"] as $arItem){?>
    	<?
    	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    	?>
    	<div class="one_job" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    		<div class="plash_jobs">			
    			<div class="name_job left"><?=$arItem["NAME"];?></div>
    			<div class="strelka_job left"></div>
    			<?if(!empty($arItem["PROPERTIES"]["SALARY"]["VALUE"])){?>
    				<div class="salary right">
    					<?echo number_format($arItem["PROPERTIES"]["SALARY"]["VALUE"],0,'.',' ')." ".GetMessage("VALUTA");?>
    				</div>
    			<?}?>
    			<div class="clear"></div>
    		</div>
    		<div class="text_job">
    			<?=$arItem["~PREVIEW_TEXT"]?>
    			<div href="" rel="nofollow" class="uni-button solid_button send_resume" onclick="openResumePopup('<?=SITE_DIR?>', '<?=$arItem['NAME']?>');"><?=GetMessage("RESUME")?></div>
    		</div>		
    	</div>
    <?}?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<script type="text/javascript">
	$('.plash_jobs').click(function(){		
		$(this).next().slideToggle();
		if(!$(this).find(".strelka_job").hasClass('active')){
			$(this).find(".strelka_job").addClass('active');
		}
		else{
			$(this).find(".strelka_job").removeClass('active');
		}
	});
</script>
<?$frame->end()?>