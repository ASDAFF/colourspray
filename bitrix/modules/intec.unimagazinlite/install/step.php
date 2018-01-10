<?if(!check_bitrix_sessid()) return;?>
<style>.install-ok{display: inline-block;border: 1px solid #a4b9cc;padding: 10px 13px;margin-bottom: 10px;	border-radius: 2px;-moz-border-radius: 2px;webkit-border-radius: 2px;-o-border-radius: 2px;}</style>
<span class="install-ok"><?=GetMessage("MOD_INST_OK")?></span>
<form action="/bitrix/admin/wizard_list.php?lang=ru">
	<input type="submit" name="" value="<?=GetMessage("OPEN_WIZARDS_LIST")?>">
<form>
