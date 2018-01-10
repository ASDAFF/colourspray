<?$this->setFrameMode(true)?>
<?include_once('script.php')?>
<div class="reviews-box" id="review_<?=$arParams['ELEMENT_ID']?>">
	<div id="showButton">
		<button class="uni-button solid_button button" onClick="return showHideForm('#review_<?=$arParams['ELEMENT_ID']?>');"><?=GetMessage('WRITE_REVIEW')?></button>
		<div class="uni-indents-vertical indent-15"></div>
	</div>
    <div id="message" style="height: 0px; overflow: hidden;"><?=GetMessage('SENDED_REVIEW')?></div>
	<div class="reviews">
		<div class="form" id="form">
			<div class="row">
				<div class="label"><?=GetMessage('NAME')?> <span class="needed">*</span></div>
				<div class="control">
					<input id="name" type="text" class="uni-input-text" />
				</div>
			</div>
			<div class="row">
				<div class="label"><?=GetMessage('DESCRIPTION')?> <span class="needed">*</span></div>
				<div class="control">
					<textarea id="description" class="uni-input-textarea" style="height: 150px;"></textarea>
				</div>
			</div>
			<div class="uni-indents-vertical indent-20"></div>
			<div class="row">
				<div class="label"></div>
				<div class="control">
					<button class="uni-button solid_button button button" onClick="return review<?=$arParams['ELEMENT_ID']?>.Send(function(){ review<?=$arParams['ELEMENT_ID']?>.formHide(); displayReviewMessage('#review_<?=$arParams['ELEMENT_ID']?>'); $('#review_<?=$arParams['ELEMENT_ID']?>').find('#showButton').hide(); })"><?=GetMessage('SEND_REVIEW')?></button>
				</div>
			</div>
		</div>
        <?$frame = $this->createFrame()->begin()?>
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
        <?$frame->end()?>
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
	
	function showHideForm(element)
	{
		element = $(element);
		var form = element.find('#form');
		
		if (form.css('display') == 'none')
		{
			form.css('height', 'auto');
			
			var height = form.height();
			
			form.css({'display':'block', 'height':'0px'});
			form.animate({'height':height + 'px'}, 500);
		}
		else
		{
			form.animate({'height':'0'}, 500, function(){
				form.css('display', 'none');
			});
		}
	}
    
    function displayReviewMessage(element)
    {
        $(element).find('#message').css('display', 'block').animate({'height': '30px'}, 500);
    }
</script>