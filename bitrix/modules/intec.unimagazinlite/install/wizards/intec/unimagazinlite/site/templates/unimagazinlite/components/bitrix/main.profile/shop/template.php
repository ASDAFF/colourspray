<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="personal_main">
<h2><?=GetMessage('USER_INFO_TITLE')?></h2>
<?=ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<form class="capital personal" method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="lang" value="<?=LANG?>" />
	<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
	<table class="personal_data">
		<tr>
			<td>
				<label for="NAME"><?=GetMessage('NAME')?></label> 
				<input type="text" id="NAME" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="LAST_NAME"><?=GetMessage('LAST_NAME')?></label> 
				<input type="text" id="LAST_NAME" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="LOGIN"><?=GetMessage('LOGIN')?><span class="starrequired">*</span></label> 
				<input required type="text" id="LOGIN" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="EMAIL"><?=GetMessage('EMAIL')?><span class="starrequired">*</span></label> 
				<input required type="email" id="EMAIL" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="PERSONAL_PHONE"><?=GetMessage('USER_PHONE')?></label> 
				<input type="text" id="PERSONAL_PHONE" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" />
			</td>
		</tr>
	</table>		
	<div class="button_block">
		<div class="change_p_text right">
			<a href="#"><?=GetMessage('CHANGE_PASSWORD')?></a>
		</div>	
		<div class="clear"></div>
		<div class="change_password">
			<table class="personal_data change_paswpersonal_data" style="display:none;width:100%;border-top:1px dotted #d2d4d6;margin-top:10px;">
				<tr>
					<td>
						<label for="NEW_PASSWORD" style="text-align:left;"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
						<input type="password" id="NEW_PASSWORD" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="NEW_PASSWORD_CONFIRM" style="text-align:left;"><?=GetMessage('NEW_PASSWORD_REQ_REPEAT')?></label>
						<input type="password" id="NEW_PASSWORD_CONFIRM" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" />
					</td>
				</tr>
			</table>
			
		</div>
		<button type="submit" name="save" class="button b right" value="save"><span><?=GetMessage('SAVE_ALL')?></span></button>
		<div class="clear"></div>
	</div>

</form>
<div class="clear"></div>
</div>