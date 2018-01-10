<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->ShowAjaxHead();?> 
<?$APPLICATION->IncludeComponent(
	"intec:startshop.forms.result.new",
	"",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"FORM_ID" => "#WEB_FORM_QUESTION_ID#",
		"FORM_VARIABLE_CAPTCHA_CODE" => "CAPTCHA_CODE",
		"FORM_VARIABLE_CAPTCHA_SID" => "CAPTCHA_SID",
		"REQUEST_VARIABLE_ACTION" => "action"
	)
);?>