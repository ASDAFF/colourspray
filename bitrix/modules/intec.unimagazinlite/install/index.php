<?
global $MESS;
$sRootPath = str_replace("\\", "/", __FILE__);
$sRootPath = substr($sRootPath, 0, strlen($sRootPath)-strlen("/install/index.php"));
include(GetLangFileName($sRootPath."/lang/", "/install/index.php"));

Class intec_unimagazinlite extends CModule
{
	var $MODULE_ID = 'intec.unimagazinlite';
	var $MODULE_CLASS;
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $PARTNER_NAME;
	var $PARTNER_URI;
	var $MODULE_CSS;
	var $MODULE_GROUP_RIGHTS = "Y";
	
	function intec_unimagazinlite()
	{
		$arModuleVersion = array();
		
		include('version.php');
		
		$this->MODULE_CLASS = 'UniMagazinLite';
		$this->MODULE_VERSION = $arModuleVersion['VERSION'];
		$this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
		$this->MODULE_NAME = GetMessage('MODULE_NAME');
		$this->MODULE_DESCRIPTION = GetMessage('MODULE_DESCRIPTION');
		$this->PARTNER_NAME = GetMessage('PARTNER_NAME');
		$this->PARTNER_URI = GetMessage('PARTNER_URI');
	}
	
	function GetInfo() {
		return array(
			$this->MODULE_ID,
			$this->MODULE_CLASS,
			$this->MODULE_NAME,
			$this->MODULE_DESCRIPTION,
			$this->PARTNER_NAME,
			$this->PARTNER_URI,
			$this->MODULE_VERSION,
			$this->MODULE_VERSION_DATE
		);
	}

	function InstallDB($install_wizard = true)
	{
		global $DB, $DBType, $APPLICATION;

		return true;
	}

	function UnInstallDB($arParams = Array())
	{
		global $DB, $DBType, $APPLICATION;

		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles()
	{
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/modules/".$this->MODULE_ID."/install/components", $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/components", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/modules/".$this->MODULE_ID."/install/modules", $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/modules", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/modules/".$this->MODULE_ID."/install/wizards", $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/wizards", true, true);
		return true;
	}
    
    function UnInstallFiles()
	{       
        DeleteDirFilesEx(BX_PERSONAL_ROOT."/modules/intec.startshop");
        DeleteDirFilesEx(BX_PERSONAL_ROOT."/wizards/intec/unimagazinlite");
		return true;
	}

	function InstallPublic()
	{
	}
    
    function InstallModules()
    {
        include('procedures/InstallModules.php');
    }
    
    function UnInstallModules()
    {
        include('procedures/UnInstallModules.php');
    }

	function DoInstall()
	{
		global $APPLICATION, $step;

		$this->InstallFiles();
		$this->InstallDB(false);
		$this->InstallEvents();
		$this->InstallPublic();
        $this->InstallModules();

        RegisterModule($this->MODULE_ID);
        
		$APPLICATION->IncludeAdminFile(GetMessage("SCOM_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/modules/".$this->MODULE_ID."/install/step.php");
	}

	function DoUninstall()
	{
		global $APPLICATION, $step;
               
		$this->UnInstallDB();
        $this->UnInstallModules();
		$this->UnInstallFiles();
		$this->UnInstallEvents();
        
        UnRegisterModule($this->MODULE_ID);
        
		$APPLICATION->IncludeAdminFile(GetMessage("SCOM_UNINSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/modules/".$this->MODULE_ID."/install/unstep.php");
	}
}
?>