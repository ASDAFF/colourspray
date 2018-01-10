<?
    include_once('install/index.php');
	
	$oInstaller = new intec_unimagazinlite();
	$oInstaller->intec_unimagazinlite();
	$arInfo = $oInstaller->GetInfo();
	
	$MODULE_ID = $arInfo[0];
    $MODULE_CLASS = $arInfo[1];
	$MODULE_NAME = $arInfo[2];
	$MODULE_DESCRIPTION = $arInfo[3];
	$PARTNER_NAME = $arInfo[4];
	$PARTNER_URI = $arInfo[5];
    $MODULE_VERSION = $arInfo[6];
    $MODULE_VERSION_DATE = $arInfo[7];
	
	unset($arInfo);
    unset($oInstaller);
?>