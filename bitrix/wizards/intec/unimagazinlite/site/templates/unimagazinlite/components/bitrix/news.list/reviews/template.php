<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if(is_array($arResult["ITEMS"])){?>
	<div class="reviews standart_block">
		<?$href = str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"]);?>
		<h3 class="header_grey">
			<?=$arResult["NAME"]?>
		</h3>
		<a href="<?=$href?>" class="all_review right"><?=GetMessage("ALL_REVIEW")?></a>
		<div class="clear"></div>
		<div class="clearfix uni_parent_col">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>			
				<div class="review uni_col uni-33" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="<?=($i==2?'margin:0':'')?>">		
					
					<?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>150, 'height'=>150),BX_RESIZE_IMAGE_PROPORTIONAL);
					$src = $file['src'];?>
					<a class="img_review" href="<?=$arItem["DETAIL_PAGE_URL"]?>" style='background-image:url(<?=$src?>)'></a>
					<a class="review_text" href="<?=$arItem["DETAIL_PAGE_URL"]?>">	
						<div class="wrap_review">
							<div class="name_review">
								<?=$arItem["PROPERTIES"]["autor"]["VALUE"];?>
							</div>
							<div class="staff_review">
								<?=$arItem["PROPERTIES"]["company"]["VALUE"];?>
								
							</div>	
							<div class="preview">
								<?echo $arItem["PREVIEW_TEXT"];?>
							</div>
							
						</div>
					</a>
				</div>
				<?$i++;
			endforeach;?>
			<div class="see_all"><a href="<?=$href?>"><?=GetMessage("ALL_REVIEWS")?> &nbsp;></a></div>
		</div>
	</div>
<?}?>

