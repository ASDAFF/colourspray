<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if(is_array($arResult["ITEMS"])&&count($arResult["ITEMS"])){
	switch($arParams["LINE_ELEMENT_COUNT"]){
		case "1":
			$class_grid = "uni-100";
		break;
		case "2":
			$class_grid = "uni-50";
		break;
		case "3":
			$class_grid = "uni-33";
		break;
		case "4":
			$class_grid = "uni-25";
		break;
		case "5":
			$class_grid = "uni-20";
		break;
		case "6":
			$class_grid = "uni-16.6";
		break;
		default:
			$class_grid = "uni-33";
		break;		
	}?>
	<div class="services_min standart_block">
		<?$href = str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"]);?>
		<h3 class="header_grey">
			<?=$arParams["NAME"]?>
		</h3>
		<div class="uni_parent_col">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>			
				<div class="news-item uni_col <?=$class_grid?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">		
					<div class="one_service">
						<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])){?>
							<?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>115, 'height'=>115),BX_RESIZE_IMAGE_EXACT);
							$src = $file['src'];?>
							<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="img_review"><img src="<?=$src?>" alt="<?=$arItem["NAME"];?>" title="<?=$arItem["NAME"];?>"></a>						
						<?}?>
						<a class="name_news" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
							<?=$arItem["NAME"];?><br/>
						</a>	
						<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
							<div class="preview">
								<?echo TruncateText($arItem["PREVIEW_TEXT"],100);?>
							</div>
						<?endif;?>	
					</div>
				</div>
			<?endforeach;?>
		</div>
	</div>
<?}?>

