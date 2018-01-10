<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if(is_array($arResult["ITEMS"])&&count($arResult["ITEMS"])>0){?>
	<?switch($arParams["LINE_ELEMENT_COUNT"]){
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
			$class_grid = "uni-16";
		break;
		default:
			$class_grid = "uni-25";
		break;		
	}?>
	<h3 class="header_grey">
		<?=$arParams["TEXT_BANNERS"]?>
	</h3>
	<div class="banners-list clearfix uni_parent_col standart_block">
		<ul>
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?	
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<li id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="uni_col <?=$class_grid?>">
					<div class="banners-list-item hover_shadow">
						<?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>280, 'height'=>314),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);?>
						<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="img_banner" style="background-image:url(<?=$file['src']?>); background-position: top;">
						</a>
						<a href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>" class="name_banner">
							<span class="name">
								<?=$arItem["NAME"]?>
							</span>
							<?if($arItem["PREVIEW_TEXT"]) { ?>
								<span class="preview_text">
									<?=$arItem["PREVIEW_TEXT"]?>
								</span>	
							<?}?>
						</a>
					</div>
				</li>	
			<?endforeach;?>
		</ul>
	</div>
	<div class="clear"></div>
<?}?>
