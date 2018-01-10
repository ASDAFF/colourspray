<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?global $options;?>
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
			$class_grid = "uni-50";
		break;		
	}?>
	
	<?
	$thisID  = 'services_bgn';
	$thisID2 = 'services_bgn_size';
	$use_bgn_grey = ($arParams['USE_GREY_BGN']=='Y' && $options["TYPE_MAIN_PAGE"]["ACTIVE_VALUE"] != "normal");
	?>
	<div class="services_min_2 standart_block <?=$use_bgn_grey?'services_bgn':''?> " id="<?=$thisID?>">
		<?$href = str_replace("#SITE_DIR#/", SITE_DIR, $arResult["LIST_PAGE_URL"]);?>
		<div class="services_bgn_wrapper">
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
						<div class='one_review'>
							<table>
								<tr>
									<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])){?>
										<?$file = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"],array('width'=>126, 'height'=>126),BX_RESIZE_IMAGE_EXACT);
										$src = $file['src'];?>
										<td class="img">
											<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
												<img alt="<?=$arItem["NAME"];?>" src="<?=$src?>">
											</a>
										</td>
									<?}?>
									<td>
										<a class="name_news" href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
											<?=$arItem["NAME"];?><br/>
										</a>	
										<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
											<div class="preview">
												<?=$arItem["PREVIEW_TEXT"];?>
											</div>
										<?endif;?>	
									</td>
								</tr>
							</table>
						</div>
					</div>
				<?endforeach;?>
			</div>
		</div>
	</div>
	<?if($use_bgn_grey){?>
		<div class="services_bgn_size" id="<?=$thisID2?>"></div>
		<script>
			$tilesHeight<?=$thisID?> = $('#<?=$thisID?>').outerHeight(false);
			$('#<?=$thisID2?>').css('height', $tilesHeight<?=$thisID?>);
			
			$(window).resize(function() {
				$tilesHeight<?=$thisID?> = $('#<?=$thisID?>').outerHeight(false);
				$('#<?=$thisID2?>').css('height', $tilesHeight<?=$thisID?>);
			});
		</script>
	<?}?>
	
<?}?>

