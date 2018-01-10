<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
    if (!empty($_REQUEST['IBLOCK_TYPE']) && !empty($_REQUEST['IBLOCK_ID']) && !empty($_REQUEST['COMPARE_NAME']))
        $APPLICATION->IncludeComponent(
        	"intec:buttons.min.updater.lite", 
        	".default", 
        	array(
        		"IBLOCK_TYPE" => $_REQUEST['IBLOCK_TYPE'],
        		"IBLOCK_ID" => $_REQUEST['IBLOCK_ID'],
        		"COMPARE_NAME" => $_REQUEST['COMPARE_NAME'],
        		"COMPARE_ADD_MASK" => ".addToCompare#ID#",
        		"COMPARE_ADDED_MASK" => ".removeFromCompare#ID#",
        		"COMPARE_ADD_SELECTOR" => ".addToCompare",
        		"COMPARE_ADDED_SELECTOR" => ".removeFromCompare"
        	),
        	false
        );
        
?>