<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="contact_form_feedback_under">

<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
<div class="contact_form_feedback">
<?
/***********************************************************************************
					form header
***********************************************************************************/
if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y" || $arResult["isFormImage"] == "Y")
{
	if ($arResult["isFormTitle"]){?>
		<div class="header_grey"><?=$arResult["FORM_TITLE"]?></div>
	<?}?>
	<?if ($arResult["isFormTitle"]){?>
		<div class="decription_form"><?=$arResult["FORM_DESCRIPTION"]?></div>
	<?}?>
<?}?>
<div class="errors" style="display:none;">
	<?=GetMessage("ERROR_MESSAGE");?>
</div>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;
/***********************************************************************************
						form questions
***********************************************************************************/
?>
<div class="tbl" >
<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
{
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'){
		echo $arQuestion["HTML_CODE"];
	}
	else if($arQuestion['STRUCTURE'][0]['FIELD_TYPE']=='text'){?>	
	<div  class="mf-name name">
		<div class="input">
			
				<span class="lbl"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?> <?=$arResult["REQUIRED_SIGN"];?><?endif;?></span>
		</div>
			<?=$arQuestion["HTML_CODE"]?>
		
	</div>	
	<?}
} //endwhile
?>
</div>
<div id="message-feed"  class="mf-message mess" >

	<?foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion):?>
		<?if($arQuestion['STRUCTURE'][0]['FIELD_TYPE']=='textarea'):?>
		<div class="input">
			<span class="lbl"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?> <?=$arResult["REQUIRED_SIGN"];?><?endif;?></span>
		</div>
			<?=$arQuestion["HTML_CODE"]?>
		<?endif;?>
	
	<? endforeach; ?>
</div>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
	<div class="controls">
		<div class="captcha_form">
			<label><?=GetMessage("CAPTCHA_TEXT")?></label>	
			<div class="input">		
			<input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" />
			<input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>"/>		
			</div>
		</div>
	</div>
<?
} // isUseCaptcha
?>
<div class="buttons clearfix">
	<div class="consent">
		
		<input type="checkbox" id="consent" checked disabled>
		<label>
			<?=GetMessage("CONSENT_LABEL")?>
			<a href="<?=SITE_DIR?>consent" target="_blank"><?=GetMessage("CONSENT_LINK")?></a>
		</label>
		
	</div>
</div>
	<input class="btn solid_button" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" onclick="SendAndTestForm(event)"/>
</div>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>
</div>
<script type="text/javascript">
	function SendAndTestForm(e){
		var flagrequared=1;
		$('.contact_form_feedback_under .starrequired').each(function(i,el){	
			var element=$(el).parent().parent().find('input,textarea');			
			if(element.val()==''){
				element.addClass('nofill');
				flagrequared=0;
			}else{
				element.removeClass('nofill');
			}
		})
		if($('.contact_form_feedback_under .captcha_form').find('input.inputtext').val()==""){
			$('.contact_form_feedback_under .captcha_form').find('input.inputtext').addClass('nofill');
			flagrequared=0;
		}else{
			$('.contact_form_feedback_under .captcha_form').find('input.inputtext').removeClass('nofill');
		}
		if(!flagrequared){
			$('.contact_form_feedback_under .errors').show();
			e.preventDefault();
		}
	}
</script>