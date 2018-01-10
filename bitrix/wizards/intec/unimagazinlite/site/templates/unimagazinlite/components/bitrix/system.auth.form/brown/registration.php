<?define("NOT_CHECK_PERMISSIONS", true);
if (isset($_POST["site_id"])) { define("SITE_ID", $_POST["site_id"]); }

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->ShowAjaxHead();
?>
<div style="max-width:316px;min-height:546px;">
	<div id="bx_reg_popup_form" style="display:none;">
		<?$APPLICATION->IncludeComponent("bitrix:main.register","pink",Array(
				"USER_PROPERTY_NAME" => "", 
				"SEF_MODE" => "Y", 
				"SHOW_FIELDS" => Array(), 
				"REQUIRED_FIELDS" => Array(), 
				"AUTH" => "Y", 
				"USE_BACKURL" => "Y", 
				"SUCCESS_PAGE" => "", 
				"SET_TITLE" => "N", 
				"USER_PROPERTY" => Array(), 
				"SEF_FOLDER" => "/", 
				"VARIABLE_ALIASES" => Array(),
				"REGISTRATION_URL" =>$_REQUEST["registrationUrl"]
			)
		);?> 
	</div>
</div>

<script>
	BX.ready(function(){
		BX("bx_reg_popup_form").style.display = "block";
	});
</script>