<div id="tabs" class="uni-tabs" style="position: static;">
	<ul class="tabs">
		<?if (strlen($arResult['DETAIL_TEXT']) > 0):?>
			<li class="tab"><a href="#description"><?=GetMessage("PRODUCT_DESCRIPTION")?></a></li>
		<?endif;?>
		<?if (count($properties) > 0 && is_array($properties)):?>
			<li class="tab"><a href="#properties"><?=GetMessage("PRODUCT_PROPERTIES")?></a></li>
		<?endif;?>
		<?if(is_numeric($arParams['REVIEWS_IBLOCK_ID'])):?>
			<li class="tab"><a href="#reviews"><?=GetMessage("PRODUCT_REVIEWS")?></a></li>
		<?endif;?>
		<?if (!empty($arResult['PROPERTIES']['CML2_DOCUMENTS']['VALUE'])):?>
			<li class="tab"><a href="#documents"><?=GetMessage("PRODUCT_DOCUMENTS")?></a></li>
		<?endif;?>
		<div class="bottom-line"></div>
	</ul>
	<div class="clear"></div>
	<?if (strlen($arResult['DETAIL_TEXT']) > 0): // ?етальное описание?>
		<div id="description" class="startshop-description uni-text-default">
			<?=$arResult['DETAIL_TEXT']?>
		</div>
	<?endif;?>
	<?if (count($properties) > 0 && is_array($properties)):?>
		<div id="properties" class="startshop-item_description">
			<div class="startshop-properties">
				<?foreach ($properties as $property):?>
					<div class="startshop-property">
						<div class="startshop-name">
							<?=$property['NAME']?>
						</div>
						<?if (!is_array($property['VALUE'])) {?>
						<div class="startshop-value">
							<?=$property['DISPLAY_VALUE']?>
						</div>
						<?} else {?>
							<div class="startshop-value">
							<?=implode(', ', $property['VALUE'])?>
						</div>
						<?}?>
					</div>
				<?endforeach;?>
			</div>
		</div>
	<?endif;?>

	<?if($arParams['USE_REVIEW'] && is_numeric($arParams['REVIEWS_IBLOCK_ID'])):?>
		<div id="reviews" class="startshop-item_description">
			<?$APPLICATION->IncludeComponent(
				"intec:reviews", 
				"reviews", 
				array(
					"IBLOCK_TYPE" => $arParams['REVIEWS_IBLOCK_TYPE'],
					"IBLOCK_ID" => $arParams['REVIEWS_IBLOCK_ID'],
					"ELEMENT_ID" => $arResult['ID'],
					"DISPLAY_REVIEWS_COUNT" => $arParams['MESSAGES_PER_PAGE']
				),
				$component
			);?>
		</div>
	<?endif;?>
	<?if (!empty($arResult['PROPERTIES']['CML2_DOCUMENTS']['VALUE'])):?>
		<div id="documents" class="startshop-item_description">
			<?include('Documents.php')?>
		</div>
	<?endif;?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#tabs").tabs({
				show: function(event, ui) { $(window).trigger('resize'); }
			});
		})
	</script>
</div>