<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<a name="tb"></a>
<a class="link" href="<?=$arResult["URL_TO_LIST"]?>"><?=GetMessage("SALE_RECORDS_LIST")?></a>
<?if(strlen($arResult["ERROR_MESSAGE"])<=0):?>
<div class="bx_cancel_order">
	<form method="post" action="<?=POST_FORM_ACTION_URI?>">
		<?=bitrix_sessid_post()?>
		<input type="hidden" name="ID" value="<?=$arResult["ID"]?>">
		<?=GetMessage("SALE_CANCEL_ORDER1") ?>
		<a href="<?=$arResult["URL_TO_DETAIL"]?>"><?=GetMessage("SALE_CANCEL_ORDER2")?> #<?=$arResult["ACCOUNT_NUMBER"]?></a>?
		<br />
		<br />
		<b><?=GetMessage("SALE_CANCEL_ORDER3") ?></b><br /><br />
		<?=GetMessage("SALE_CANCEL_ORDER4") ?>:<br />
		<textarea class="bx_textarea_cancel" name="REASON_CANCELED" cols="60" rows="3"></textarea><br /><br />
		<input type="hidden" name="CANCEL" value="Y">
		<input type="submit" name="action" class="solid_button" value="<?= GetMessage("SALE_CANCEL_ORDER_BTN") ?>">
	</form>
</div>
<?
else:
	echo ShowError($arResult["ERROR_MESSAGE"]);
endif;?>