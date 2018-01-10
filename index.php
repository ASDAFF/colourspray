<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("HUGNER - Производитель окрасочного оборудования, официальный сайт.");
?>
<?if($options["TYPE_MAIN_PAGE"]["ACTIVE_VALUE"] == "normal"){
	require($_SERVER["DOCUMENT_ROOT"].SITE_DIR."2_coll_index.php");
}else{
	require($_SERVER["DOCUMENT_ROOT"].SITE_DIR."1_coll_index.php");
}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>