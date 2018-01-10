<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("");?>
<?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:3:{s:10:\"google_lat\";s:7:\"55.7383\";s:10:\"google_lon\";s:7:\"37.5946\";s:12:\"google_scale\";i:13;}",
		"MAP_WIDTH" => "900",
		"MAP_HEIGHT" => "400",
		"CONTROLS" => array(),
		"OPTIONS" => array(),
		"MAP_ID" => ""
	)
);?><br>