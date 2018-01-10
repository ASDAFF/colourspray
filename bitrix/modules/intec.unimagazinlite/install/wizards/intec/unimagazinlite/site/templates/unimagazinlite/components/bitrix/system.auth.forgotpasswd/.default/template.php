<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
ShowMessage($arParams["~AUTH_RESULT"]);
?>
123123
<div class="bx_forgotpassword_page">
	<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<?if (strlen($arResult["BACKURL"]) > 0):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif;?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="SEND_PWD">
		
		<div class="header_grey"><?=GetMessage("AUTH_GET_CHECK_STRING")?></div>
		<div style="margin-bottom:5px;"><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></div>
		
		<strong><?=GetMessage("AUTH_LOGIN")?></strong>
		<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" class="input_text_style solid_input" />

		<strong><?=GetMessage("AUTH_OR")?></strong>

		<strong><?=GetMessage("AUTH_EMAIL")?></strong>
		<input type="text" name="USER_EMAIL" maxlength="255" class="input_text_style solid_input" />

		<a class="left" href="<?=$arResult["AUTH_AUTH_URL"]?>"><?=GetMessage("AUTH_AUTH")?></a>
		
		<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" class="solid_button fogot_psw_submit right"/>
		
		<div class="clear"></div>

		
	</form>
</div>
<script type="text/javascript">
	document.bform.USER_LOGIN.focus();
</script>
