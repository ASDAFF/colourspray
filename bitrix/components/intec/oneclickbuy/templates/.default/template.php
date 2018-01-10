<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="ocb-form">
	<div class="title"><?=GetMessage('FORM_HEADER_CAPTION')?></div>	
	<div class="comment"></div>
	<div class="ocb-form-wrap">
		<div class="separator"></div>
		<div class="price_image">
			<div class="name_product"><?=$arParams["PRODUCT_NAME"]?></div>
            <div class="uni-indents-vertical indent-25"></div>
			<div class="image" style="background-image:url(<?=($arParams["IMAGE"]?$arParams["IMAGE"]:SITE_TEMPLATE_PATH."/images/noimg/no-img.png")?>)"></div>
            <div class="uni-indents-vertical indent-25"></div>		
			<div class="price">
				<span class="new_price"><?=$arParams["PRODUCT_PRICE_PRINT"]?></span>
				<?if(!empty($arParams["OLD_PRICE"])){?>
					<span class="old_price"><?=$arParams["NEW_PRICE"]?></span>
				<?}?>
			</div>
		</div>
		<form method="post" id="ocb-form" class="nosubit_ocb" action="<?=SITE_DIR?>ajax/one_click_buy.php">
			<div class="ocb-form-result" id="ocb-form-result">
					<div class="ocb-result-icon-success" style="display:none;"><?=GetMessage('ORDER_SUCCESS')?></div>
					<div class="ocb-result-icon-fail" style="display:none;"><?=GetMessage('ORDER_ERROR')?> <span></span></div>
					<div class="ocb-result-text" style="display:none;"><?=GetMessage('ORDER_SUCCESS_TEXT')?></div>
			</div>
			<div class="ocb-params">
				<input type="hidden" name="PROP_NAME" value="<?=$arParams['PROP_NAME']?>" />
				<input type="hidden" name="PROP_PHONE" value="<?=$arParams['PROP_PHONE']?>" />
				<input type="hidden" name="PROP_COMMENT" value="<?=$arParams['PROP_COMMENT']?>" />
				<input type="hidden" name="PRODUCT_ID" value="<?=$arParams['PRODUCT_ID']?>" />
				<input type="hidden" name="PRODUCT_NAME" value="<?=$arParams['PRODUCT_NAME']?>" />
				<input type="hidden" name="PRODUCT_QUANTITY" value="<?=$arParams['PRODUCT_QUANTITY']?>" />
				<input type="hidden" name="PRODUCT_PRICE" value="<?=$arParams['PRODUCT_PRICE']?>" />
				<input type="hidden" name="PRODUCT_CURRENCY" value="<?=$arParams['PRODUCT_CURRENCY']?>" />
				<input type="hidden" name="action" value="addOneBuyClick" />
				<?=bitrix_sessid_post()?>
				<?
				if ($USER->IsAuthorized())	{
							$user_name = $USER->GetFullName();
							
				}
				?>
				<div class="ocb-form-field">
					<label><?=GetMessage('CAPTION_USER_NAME')?>
						<span class="starrequired">*</span>
					</label>
					<input type="text" class="uni-input-text" name="USER_NAME" value="<?=$user_name?>" id="ocb-id-name?>" />
					<div class="requared"><?=GetMessage("IBLOCK_FORM_IMPORTANT")?></div>
				</div>
				<div class="ocb-form-field">
					<label><?=GetMessage('CAPTION_USER_PHONE')?>
						<span class="starrequired">*</span>
					</label>
					<input type="text" class="uni-input-text" name="USER_PHONE" value="" id="ocb-id-phone" />
					<div class="requared"><?=GetMessage("IBLOCK_FORM_IMPORTANT")?></div>
				</div>
				<div class="ocb-form-field">
					<label><?=GetMessage('CAPTION_COMMENT')?>	
					</label>
					<textarea class="uni-input-text" name="USER_COMMENT" value="" id="ocb-id-comment?>"></textarea>
				</div>
				
				
				
				<div class="ocb-modules-button">
					<button class="uni-button solid_button button" type="submit" id="ocb-form-button" name="ocb_form_button" value="<?=GetMessage('ORDER_BUTTON_CAPTION')?>">
						<span><?=GetMessage("ORDER_BUTTON_CAPTION")?></span>
					</button>
					<div class="promt">
						<span><span class="starrequired">*</span>-<?=GetMessage("IBLOCK_FORM_PROMPT");?></span>
					</div>
				</div>
				<div class="ocb-form-loader"></div>
			</div>
			
		</form>		
	</div>
	<div class="consent">
		<a href="<?=SITE_DIR?>consent" target="_blank">
		<input type="checkbox" id="consent" checked disabled>
		<label>
			<?=GetMessage("CONSENT")?>
		</label>
		</a>
	</div>
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('input[name="ONE_CLICK_BUY[PHONE]"]').mask("+7 (999) 999-9999");
	})
	$('.nosubit_ocb').on('submit',function(event){
		event.preventDefault();
		flagrequared=1;
		$('.starrequired').each(function(i,el){	
			var element=$(el).parent().parent().find('input,textarea');			
			if(element.val()==''){
				element.addClass('nofill');
				element.next().show();
				flagrequared=0;
			}else{
				element.removeClass('nofill');
				element.next().hide();
				//flagrequared=1;
			}
		})	
		//alert(flagrequared);
		if(!flagrequared){
			return false;
		}else{			
			$.ajax({
				url: $(this).attr('action'),
				data: $(this).serialize(),
				type: 'POST',				
				
			}).done( function(Res) 
				{	
					$('.ocb-result-icon-fail').hide();
					if($.trim(Res) == 'success') {
						$('.ocb-params').hide();
						$('.ocb-result-icon-success').show();
						$('.ocb-result-text').show();
						return false;
					}else{
						$('.ocb-result-icon-fail span').html(Res);
						$('.ocb-result-icon-fail').show();
						return false;
					}
					return false;
				}
			
			);
		}
	});
</script>