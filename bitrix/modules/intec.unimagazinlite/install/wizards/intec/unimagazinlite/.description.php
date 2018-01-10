<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
    $arWizardDescription = array(
    	"NAME" => GetMessage("WIZARD_NAME"), 
    	"DESCRIPTION" => GetMessage("WIZARD_DESCRIPTION"), 
    	"VERSION" => "1.0.7",
    	"START_TYPE" => "WINDOW",
    	"WIZARD_TYPE" => "INSTALL",
    	"PARENT" => "wizard_sol",
    	"TEMPLATES" => array(
    		Array("SCRIPT" => "wizard_sol")
    	),
    	"STEPS" => array(
            "StartupStep",
            "SelectSiteStep",
            "SelectTemplateStep",
            "SelectThemeStep",
            "SiteSettingsStep",
            "InstallStep",
            "FinishStep"
        )
    );
?>