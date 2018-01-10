<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach($arResult["MESSAGE"] as $itemID=>$itemValue)
	echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"OK"));
foreach($arResult["ERROR"] as $itemID=>$itemValue)
	echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"ERROR"));
if($arResult["ALLOW_ANONYMOUS"]=="N" && !$USER->IsAuthorized()):
	echo ShowMessage(array("MESSAGE"=>GetMessage("CT_BSE_AUTH_ERR"), "TYPE"=>"ERROR"));
else:
?>
<div class="subscription">
	<form action="<?=$arResult["FORM_ACTION"]?>" method="post">		
		<?echo bitrix_sessid_post();?>
		<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
		<input type="hidden" name="ID" value="<?echo $arResult["SUBSCRIPTION"]["ID"];?>" />
		<input type="hidden" name="RUB_ID[]" value="0" />
		
		<?if($arResult["ID"]>0 && $arResult["SUBSCRIPTION"]["CONFIRMED"] <> "Y"):?>
			<div class="subscription-utility">
				<div><?echo GetMessage("CT_BSE_CONF_NOTE")?></div>
				<div class="uni-indents-vertical indent-5"></div>
				<div><?echo GetMessage("CT_BSE_CONF_NOTE1")?></div>
				<div class="uni-indents-vertical indent-10"></div>
				<input class="uni-input-text" name="CONFIRM_CODE" type="text" class="subscription-textbox" value="<?echo GetMessage("CT_BSE_CONFIRMATION")?>" onblur="if (this.value=='')this.value='<?echo GetMessage("CT_BSE_CONFIRMATION")?>'" onclick="if (this.value=='<?echo GetMessage("CT_BSE_CONFIRMATION")?>')this.value=''" /> 
				<div class="uni-indents-vertical indent-40"></div>
				<input class="uni-button solid_button" type="submit" name="confirm" value="<?echo GetMessage("CT_BSE_BTN_CONF")?>" />
			</div>
			<div class="uni-indents-vertical indent-40"></div>
			<div class="uni-indents-vertical indent-40"></div>
		<?endif?>
		<div class="subscription-form">		
			<div class="field-form">
				<input type="text" class="uni-input-text" name="EMAIL" value="<?echo $arResult["SUBSCRIPTION"]["EMAIL"]!=""? $arResult["SUBSCRIPTION"]["EMAIL"]: $arResult["REQUEST"]["EMAIL"];?>" class="subscription-email" placeholder="<?=GetMessage("CT_BSE_EMAIL")?>" />
			</div>
			<div class="uni-indents-vertical indent-40"></div>
			<div class="field-name"><?echo GetMessage("CT_BSE_RUBRIC_LABEL")?></div>
			<div class="field-form">
				<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
					<div class="subscription-rubric">
						<label class="uni-button-checkbox" for="RUBRIC_<?echo $itemID?>">
							<input type="checkbox" id="RUBRIC_<?echo $itemID?>" name="RUB_ID[]" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> />
							<div class="selector"></div>
							<div class="text"><?echo $itemValue["NAME"]?></div>
						</label>
					</div>
				<?endforeach;?>
				<?if($arResult["ID"]==0):?>
				<?else:?>
					<div class="uni-indents-vertical indent-10"></div>
					<div class="subscription-notes"><?echo GetMessage("CT_BSE_EXIST_NOTE")?></div>
				<?endif?>
			</div>
			<div class="uni-indents-vertical indent-40"></div>
			<div class="field-name"><?echo GetMessage("CT_BSE_FORMAT_LABEL")?></div>
			<div class="field-form">
				<div class="subscription-format">
					<label class="uni-button-radio" for="MAIL_TYPE_TEXT">
						<input type="radio" name="FORMAT" id="MAIL_TYPE_TEXT" value="text" <?if($arResult["SUBSCRIPTION"]["FORMAT"] != "html") echo "checked"?> />
						<div class="selector"></div>
						<div class="text"><?echo GetMessage("CT_BSE_FORMAT_TEXT")?></div>
					</label>/
					<label class="uni-button-radio" for="MAIL_TYPE_HTML">
						<input type="radio" name="FORMAT" id="MAIL_TYPE_HTML" value="html" <?if($arResult["SUBSCRIPTION"]["FORMAT"] == "html") echo "checked"?> />
						<div class="selector"></div>
						<div class="text"><?echo GetMessage("CT_BSE_FORMAT_HTML")?></div>
					</label>
				</div>
			</div>
			<div class="uni-indents-vertical indent-40"></div>
			<div class="field-form">
				<div class="subscription-buttons">
					<input class="uni-button solid_button" type="submit" name="Save" value="<?echo ($arResult["ID"] > 0? GetMessage("CT_BSE_BTN_EDIT_SUBSCRIPTION"): GetMessage("CT_BSE_BTN_ADD_SUBSCRIPTION"))?>" />
				</div>
			</div>
		</div>
	</form>
</div>
<?endif;?>