<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>
<form name="bform" method="post" target="_top" class="capital faq" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>

<table class="data-table bx-forgotpass-table">
	<tbody>
		<tr>
			<td>
				<?=GetMessage("AUTH_LOGIN")?>
				<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" />&nbsp;<?=GetMessage("AUTH_OR")?>
			</td>
		</tr>
		<tr> 
			<td>
				<?=GetMessage("AUTH_EMAIL")?>			
				<input type="text" name="USER_EMAIL" maxlength="255" />
			</td>
		</tr>
	</tbody>
	<tfoot>
		<tr> 
			<td colspan="2">
				<input type="submit" class="button" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
				<div class="clear"></div>
				<a style="padding-top:5px;" class="vhod_button" href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a>
			</td>
		</tr>
	</tfoot>
</table>
</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
