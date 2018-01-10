<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?if(is_array($arResult["ITEMS"])){?>
	<div class="faq_block">
	<div class="title"><?=GetMessage("CT_TITLE")?></div>
	<?foreach($arResult["ITEMS"] as $arItem){?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>			
			<div class="one_faq" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div>
					<span class="title_question_faq"><?=GetMessage("QUESTION")?></span>	
					<span class="question_faq"><?=$arItem["NAME"];?></span>
				</div>
				<div class="arrow_faq"></div>
				<div class="answer_faq">
					<?=$arItem["DETAIL_TEXT"]?>
				</div>						
			</div>
		<?}?>
			<div href="" rel="nofollow" class="uni-button solid_button send_question" onclick="openFaqPopup('<?=SITE_DIR?>');"><?=GetMessage("RESUME")?></div>
	</div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>	
<?}?>