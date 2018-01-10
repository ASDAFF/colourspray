<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>
<div class="bx-auth-reg">

<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

<form method="post" action="/login/?register=yes" name="bform" enctype="multipart/form-data">
<input type="hidden" name="TYPE" value="REGISTRATION">
<input type="hidden" name="AUTH_FORM" value="Y">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
<div class="header_grey"><?=GetMessage("AUTH_REGISTER")?></div>
<?foreach ($arResult["SHOW_FIELDS"] as $FIELD){?>
	<strong><?=GetMessage("REGISTER_FIELD_".$FIELD)?>:<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></strong>
	<?switch ($FIELD){
		case "PASSWORD":
			?><input size="30" type="password" name="USER_<?=$FIELD?>" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="bx-auth-input input_text_style" />
				<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
				<script type="text/javascript">
				document.getElementById('bx_auth_secure').style.display = 'inline-block';
				</script>
			<?endif;
			break;
		case "CONFIRM_PASSWORD":
			?><input size="30" type="password" name="USER_<?=$FIELD?>" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="input_text_style input_text_style"/><?
			break;
		case "PERSONAL_GENDER":
			?><select name="USER_<?=$FIELD?>">
				<option value=""><?=GetMessage("USER_DONT_KNOW")?></option>
				<option value="M"<?=$arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_MALE")?></option>
				<option value="F"<?=$arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
			</select><?
			break;
		case "PERSONAL_COUNTRY":
		case "WORK_COUNTRY":
			?><select name="USER_<?=$FIELD?>"><?
			foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value)
			{
				?><option value="<?=$value?>"<?if ($value == $arResult["VALUES"][$FIELD]):?> selected="selected"<?endif?>><?=$arResult["COUNTRIES"]["reference"][$key]?></option>
			<?
			}
			?></select><?
			break;
		case "PERSONAL_PHOTO":
		case "WORK_LOGO":
			?><input size="30" type="file" name="REGISTER_FILES_<?=$FIELD?>" /><?
			break;
		case "PERSONAL_NOTES":
		case "WORK_NOTES":
			?><textarea cols="30" rows="5" name="USER_<?=$FIELD?>"><?=$arResult["VALUES"][$FIELD]?></textarea><?
			break;
		default:
			if ($FIELD == "PERSONAL_BIRTHDAY"):?><small><?=$arResult["DATE_FORMAT"]?></small><br /><?endif;
			?><input size="30" type="text" name="USER_<?=$FIELD?>" value="<?=$arResult["VALUES"][$FIELD]?>" class="input_text_style"/><?
				if ($FIELD == "PERSONAL_BIRTHDAY")
					$APPLICATION->IncludeComponent(
						'bitrix:main.calendar',
						'',
						array(
							'SHOW_INPUT' => 'N',
							'FORM_NAME' => 'regform',
							'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
							'SHOW_TIME' => 'N'
						),
						null,
						array("HIDE_ICONS"=>"Y")
					);
				?><?
	}?>
<?}?>

<?
/* CAPTCHA */
if ($arResult["USE_CAPTCHA"] == "Y")
{
	?>
		<strong><?=GetMessage("REGISTER_CAPTCHA_TITLE")?></strong>	
		<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
		<strong><?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="starrequired">*</span>
		<input type="text" name="captcha_word" maxlength="50" value="" class="input_text_style"/>		
	<?
}
/* !CAPTCHA */
?>
<p><span class="starrequired">*</span>-<?=GetMessage("AUTH_REQ")?></p>
	<div style="width:100%;margin:0 auto;">
	<input type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" class="bt_pink big shadow"/>
	</div>
	

</form>
<?endif?>
</div>