<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="login_page">
	<?
	ShowMessage($arParams["~AUTH_RESULT"]);
	ShowMessage($arResult['ERROR_MESSAGE']);
	?>
	<div class="header_grey"><?echo GetMessage("AUTH_TITLE")?></div>
	<div class="login_form clearfix">
		<form name="form_auth" method="post" target="_top" action="<?=SITE_DIR?>auth/<?//=$arResult["AUTH_URL"]?>" class="bx_auth_form">
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="AUTH" />
			<?if (strlen($arParams["BACKURL"]) > 0 || strlen($arResult["BACKURL"]) > 0):?>
				<input type="hidden" name="backurl" value="<?=($arParams["BACKURL"] ? $arParams["BACKURL"] : $arResult["BACKURL"])?>" />
			<?endif?>
			<?foreach ($arResult["POST"] as $key => $value):?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?endforeach?>
			<input class="input_text_style solid_input" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="e-mail"/>
			<input class="input_text_style solid_input" type="password" name="USER_PASSWORD" maxlength="255" placeholder="<?=GetMessage("AUTH_PWS")?>"/>
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
			<?endif?>
			<?if($arResult["CAPTCHA_CODE"]):?>
				<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:
				<input class="bx-auth-input" type="text" name="captcha_word" maxlength="50" value="" size="15" />
			<?endif;?>	
			<?if ($arParams["NOT_SHOW_LINKS"] != "Y"):?>		
				<div class="link">
					<a href="<?=$arParams["AUTH_FORGOT_PASSWORD_URL"] ? $arParams["AUTH_FORGOT_PASSWORD_URL"] : $arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
				</div>
			<?endif?>
			<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
				<div class="rememberme">
					<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" checked/>
					<label for="USER_REMEMBER" class="USER_REMEMBER right"><?=GetMessage("AUTH_REMEMBER_ME")?></label>					
				</div>
				<div class="clear"></div>
				<input type="submit" name="Login" class="solid_button login_button" value="<?=GetMessage("AUTH_AUTHORIZE")?>" />
				<div class="clear"></div>
			<?endif?>
			<div class="clear"></div>
		</form>
	</div>	
	<?if($arResult["AUTH_SERVICES"]):
		$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
			array(
				"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
				"CURRENT_SERVICE"=>$arResult["CURRENT_SERVICE"],
				"AUTH_URL"=>$arResult["AUTH_URL"],
				"POST"=>$arResult["POST"],
				"SUFFIX" => "main",
			),
			$component,
			array("HIDE_ICONS"=>"Y")
		);
	endif;?>
</div>
<div class="reg_block">
	<a href="<?=$arParams["AUTH_REGISTER_URL"] ? $arParams["AUTH_REGISTER_URL"] : $arResult["AUTH_REGISTER_URL"]?>" class="registration_button solid_button">
		<?=GetMessage("AUTH_REGISTRATION");?>
	</a>
	<div class="label_text">
		<?=GetMessage("TEXT_LABEL")?>
	</div>
</div>
<div class="clear"></div>
<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
	try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
	try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>

