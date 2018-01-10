<?define("NOT_CHECK_PERMISSIONS", true);
if (isset($_POST["site_id"])) { define("SITE_ID", $_POST["site_id"]); }
	

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->ShowAjaxHead();
?>
<div class="login_form_under">
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "",
		array(
			"BACKURL" => $_REQUEST["backurl"],
			"AUTH_FORGOT_PASSWORD_URL" => $_REQUEST["forgotPassUrl"],
			"AUTH_REGISTER_URL" => $_REQUEST["registrationUrl"]
		),
		false
	);?>
</div>
<script>
	BX.ready(function(){
		BX("bx_auth_popup_form").style.display = "block";
	});
</script>