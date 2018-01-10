<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if (!defined("WIZARD_SITE_DIR") || !defined("WIZARD_SITE_ROOT_PATH")) die();?>
<?
    $arNewUrlRewrite[] = array(
    	"CONDITION" => "#^".WIZARD_SITE_DIR."personal/order/#",
    	"RULE" => "",
    	"ID" => "bitrix:sale.personal.order",
    	"PATH" => WIZARD_SITE_DIR."personal/order/index.php",
    );
    
    $arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."help/article/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."help/article/index.php",
	);
    
    $arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."company/news/index.php",
	);
	
	$arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/reviews/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."company/reviews/index.php",
	);
	
	$arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/projects/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."company/projects/index.php",
	);

    $arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."help/brand/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."help/brand/index.php",
	);
    
    $arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => WIZARD_SITE_DIR."catalog/index.php",
	);
    
	$arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."stores/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."stores/index.php",
	);
		
    $arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."sale/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."sale/index.php",
	);
    
    $arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."contacts/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."contacts/index.php",
	);
    
	$arNewUrlRewrite[] = array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."uslugi/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => WIZARD_SITE_DIR."uslugi/index.php",
	);
    
    $arUrlRewrite = array(); 
    if (file_exists(WIZARD_SITE_ROOT_PATH."/urlrewrite.php"))
    	include(WIZARD_SITE_ROOT_PATH."/urlrewrite.php");
        
    foreach ($arNewUrlRewrite as $arUrl)
    	if (!in_array($arUrl, $arUrlRewrite))
    		CUrlRewriter::Add($arUrl);
?>