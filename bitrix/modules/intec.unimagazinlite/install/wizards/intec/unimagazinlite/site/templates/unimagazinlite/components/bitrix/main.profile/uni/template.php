<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>
<?=ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<div class="bx_profile clearfix">
	<div class="personal_data">
		<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
			<?=$arResult["BX_SESSION_CHECK"]?>
			<input type="hidden" name="lang" value="<?=LANG?>" />
			<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
			<input type="hidden" name="LOGIN" value=<?=$arResult["arUser"]["LOGIN"]?> />	
			<div class="one_group">
				<label for="NAME"><?=GetMessage('NAME')?>:</label>
				<input type="text" class="solid_input" name="NAME" value="<?=$arResult["arUser"]["NAME"]?>" placeholder="<?=GetMessage('NAME')?>"/>
			</div>
			<div class="one_group">
				<label for="LAST_NAME"><?=GetMessage('LAST_NAME')?>:</label>
				<input type="text" class="solid_input" name="LAST_NAME" value="<?=$arResult["arUser"]["LAST_NAME"]?>" placeholder="<?=GetMessage('LAST_NAME')?>">
			</div>
			<?/*<div class="one_group">
				<label for="SECOND_NAME"><?=GetMessage('SECOND_NAME')?></label>
				<input type="text" class="solid_input" name="SECOND_NAME" maxlength="50" placeholder="<?=GetMessage('SECOND_NAME')?>" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
			</div>*/?>
			<div class="one_group">
				<label for="PERSONAL_PHONE"><?=GetMessage('PERSONAL_PHONE')?>:</label>
				<input type="text" class="solid_input" name="PERSONAL_PHONE" placeholder="<?=GetMessage('PERSONAL_PHONE')?>" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" />
			</div>
			<div class="one_group">
				<label for="PERSONAL_PHONE">Email:</label>
				<input type="text" class="solid_input" name="EMAIL" placeholder="<?=GetMessage('EMAIL')?>" value="<?=$arResult["arUser"]["EMAIL"]?>" />
			</div>
			
			<?/*<tr>
					<td><strong><?=GetMessage('NEW_PASSWORD_REQ')?>:</strong></td>
					<td><input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" /> </td>
				</tr>
				<tr>
					<td><strong><?=GetMessage('NEW_PASSWORD_CONFIRM')?>:</strong></td>
					<td><input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /> </td>
				</tr>*/?>
			<input name="save" value="<?=GetMessage("MAIN_SAVE")?>" class="solid_button save_personal" type="submit">			
		</form>
	</div>
	<?if($arResult["SOCSERV_ENABLED"]){?>
		<div class="socials">
			<?$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", "change_psw", Array(
				"SHOW_PROFILES" => "Y",	// Показывать объединенные профили
					"ALLOW_DELETE" => "Y",	// Разрешить удалять объединенные профили
				),
				false
			);?>
		</div>
	<?}?>
</div>

