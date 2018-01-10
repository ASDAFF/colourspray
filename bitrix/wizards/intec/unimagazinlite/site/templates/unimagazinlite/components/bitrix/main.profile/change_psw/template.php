<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>
<?=ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	echo ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<div class="bx_profile clearfix">
	<div class="change_psw">
		<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>?" enctype="multipart/form-data">
			<?=$arResult["BX_SESSION_CHECK"]?>
			<input type="hidden" name="lang" value="<?=LANG?>" />
			<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
			<input type="hidden" name="LOGIN" value=<?=$arResult["arUser"]["LOGIN"]?> />			
			<input type="hidden" name="EMAIL" value=<?=$arResult["arUser"]["EMAIL"]?> />				
			<div class="one_group">
				<input type="password" class="solid_input" name="NEW_PASSWORD" value="" autocomplete="off" placeholder="<?=GetMessage('NEW_PASSWORD_REQ')?>:" />			
				<span><?=GetMessage("LENGHT_PSW")?></span>
			</div>
			<div class="one_group">				
				<input type="password" class="solid_input" name="NEW_PASSWORD_CONFIRM" placeholder="<?=GetMessage('NEW_PASSWORD_CONFIRM')?>" value="" autocomplete="off" />
			</div>
			<input name="save" value="<?=GetMessage("MAIN_SAVE")?>" class="solid_button save_personal" type="submit">			
		</form>
	</div>
</div>

