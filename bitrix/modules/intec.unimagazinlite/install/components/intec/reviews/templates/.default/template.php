<?include_once('script.php')?>
<div class="reviews-box" id="review_<?=$arParams['ELEMENT_ID']?>">
	<button class="button" onClick="review<?=$arParams['ELEMENT_ID']?>.formShow(); $(this).hide(); return false;"><?=GetMessage('WRITE_REVIEW')?></button>
	<div class="reviews">
		<div class="form" id="form">
			<div class="row">
				<div class="label"><?=GetMessage('NAME')?> <span class="needed">*</span></div>
				<div class="control">
					<input id="name" type="text" class="control-text" />
				</div>
			</div>
			<div class="row">
				<div class="label"><?=GetMessage('DESCRIPTION')?> <span class="needed">*</span></div>
				<div class="control">
					<textarea id="description" class="control-text" style="height: 100px"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="label"></div>
				<div class="control">
					<button class="button right" onClick="return review<?=$arParams['ELEMENT_ID']?>.Send(function(){ review<?=$arParams['ELEMENT_ID']?>.formHide(); })"><?=GetMessage('SEND_REVIEW')?></button>
				</div>
			</div>
		</div>
		<?foreach ($arResult['ELEMENTS'] as $arElement) {?>
			<div class="review">
				<div class="info">
					<div class="name"><?=$arElement['NAME']?></div>
					<div class="date"><?=date('d.m.Y', $arElement['DATE_CREATE_UNIX'])?></div>
				</div>
				<div class="description">
					<?=$arElement['PREVIEW_TEXT']?>
				</div>
			</div>
			<div class="clear"></div>
		<?}?>
	</div>
</div>
<?	$arJsParams = array();
	$arJsParams['ELEMENT'] = '#review_'.$arParams['ELEMENT_ID'];
	$arJsParams['PARAMETERS']['FILTER_FIELDS'] = true;
	$arJsParams['PARAMETERS']['IBLOCK_ID'] = $arParams['IBLOCK_ID'];
	$arJsParams['PARAMETERS']['ELEMENT_ID'] = $arParams['ELEMENT_ID'];
	$arJsParams['PARAMETERS']['CHARSET'] = SITE_CHARSET;?>
<script>
	var review<?=$arParams['ELEMENT_ID']?> = new DefaultReview(<?=CUtil::PhpToJSObject($arJsParams)?>);
</script>