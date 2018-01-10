<?
	$sModulesDirectory = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/modules";
        
	if (CModule::IncludeModule('intec.startshop'))
	{
		$sInstallFile = $sModulesDirectory.'/intec.startshop/install/index.php';
		
		if (is_file($sInstallFile))
		{	
			$_REQUEST['startshopUninstall']['TABLES'] = 'Y';
			$_REQUEST['startshopUninstall']['SETTINGS'] = 'Y';
			require_once($sInstallFile);
			$oModule = new intec_startshop();
			$oModule->intec_startshop();
			$oModule->MODE = 'SILENT';
			$oModule->DoUninstall();
		}
	}
?>