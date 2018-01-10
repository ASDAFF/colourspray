<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="bx_registration_page">	
	<div class="header_grey">
		<?=GetMessage("AUTH_REGISTER")?>
	</div>
	<?
	ShowMessage($arParams["~AUTH_RESULT"]);
	if($arResult["USE_EMAIL_CONFIRMATION"] === "Y" && is_array($arParams["AUTH_RESULT"]) &&  $arParams["AUTH_RESULT"]["TYPE"] === "OK") {?>
		<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
	<?} else {?>
		<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
			<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
		<?endif?>
		<!--noindex-->
		<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform">	
			<?if (strlen($arResult["BACKURL"]) > 0):?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?endif?>
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="REGISTRATION" />

			<strong><?=GetMessage("AUTH_NAME")?></strong>
			<input type="text" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>" class="solid_input" />

			<strong><?=GetMessage("AUTH_LAST_NAME")?></strong>
			<input type="text" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>" class="solid_input" />

			<strong><span class="starrequired">*</span><?=GetMessage("AUTH_LOGIN_MIN")?></strong>
			<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="solid_input" />

			<strong><span class="starrequired">*</span><?=GetMessage("AUTH_PASSWORD_REQ")?></strong>
			<input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="solid_input" />

			<strong><span class="starrequired">*</span><?=GetMessage("AUTH_CONFIRM")?></strong>
			<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="solid_input" />

			<strong><span class="starrequired">*</span><?=GetMessage("AUTH_EMAIL")?></strong>
			<input type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="solid_input" />

			<!-- User properties -->
			<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
				<?=strLen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?>
				<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
				<?if ($arUserField["MANDATORY"]=="Y"):?><span class="required">*</span><?endif;?>
					<?=$arUserField["EDIT_FORM_LABEL"]?>:</td><td>
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.field.edit",
							$arUserField["USER_TYPE"]["USER_TYPE_ID"],
							array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS"=>"Y"));?>
				<?endforeach;?>
			<?endif;?>
			<!-- /User properties -->
			<!-- CAPTCHA -->
				<?if ($arResult["USE_CAPTCHA"] == "Y"):?>
					<div class="captcha">
						<strong><?=GetMessage("CAPTCHA_REGF_TITLE")?></strong>
						<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
						<strong><span class="starrequired">*</span><?=GetMessage("CAPTCHA_REGF_PROMT")?>:</strong>
						<input type="text" name="captcha_word" maxlength="50" value="" class="solid_input" />		
					</div>
				<?endif?>
			<!-- /CAPTCHA -->
			<div class="left" style="width:50%;">
				<span class="starrequired">*</span>-<?=GetMessage("AUTH_REQ")?>
				<br>
				<a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_AUTH")?></a>
			</div>			
			<input type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" class="solid_button" />			
			
		</form>
		<!--/noindex-->
	<?}?>
</div>
<script type="text/javascript">
	document.bform.USER_NAME.focus();
</script>