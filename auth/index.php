<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
<style>
h1 {
	display:none;
}
</style>

<?if(!$USER->IsAuthorized()){
	$APPLICATION->AuthForm('', true, true);
}else{
	ShowMessage(array("TYPE" => "OK", "MESSAGE" => "Вы зарегистрированы и успешно авторизовались."));
	LocalRedirect(SITE_DIR."personal/");
}?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>