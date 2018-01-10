<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/install/wizard_sol/wizard.php");?>

<?use \Bitrix\Main\Loader?>

<?
    class StartupStep extends CWizardStep
    {
        function InitStep()
    	{
            $wizard =& $this->GetWizard();
            $this->SetStepID("startup");
    		$this->SetTitle(GetMessage("WIZARD_STEPS_STARTUP_TITLE"));
            
            if (CModule::IncludeModule('intec.unimagazinlite') && CModule::IncludeModule('intec.startshop'))
            {
                $this->SetNextStep("select_site");
            }
    		
    		$this->SetNextCaption(GetMessage("WIZARD_STEPS_STARTUP_BUTTONS_NEXT"));
    		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
        }
        
        function ShowStep()
        {
            $bModulesInstalled = CModule::IncludeModule('intec.unimagazinlite') && CModule::IncludeModule('intec.startshop');
            
            if ($bModulesInstalled)
                $this->content .=
    			'<table class="wizard-completion-table">
    				<tr>
    					<td class="wizard-completion-cell">'
    						.GetMessage('WIZARD_STEPS_STARTUP_MODULES_INSTALLED').'!'.
    					'</td>
    				</tr>
    			</table>';
            
            if (!$bModulesInstalled)
                $this->content .=
    			'<table class="wizard-completion-table">
    				<tr>
    					<td class="wizard-completion-cell">'
    						.GetMessage('WIZARD_STEPS_STARTUP_MODULES_NOT_INSTALLED');
            
            if (!$bModulesInstalled) 
            {
                $arModules = array();
            
                if (!CModule::IncludeModule('intec.unimagazinlite'))
                    $arModules[] = GetMessage('WIZARD_STEPS_STARTUP_MODULES_UNIMAGAZINLITE');
                
                if (!CModule::IncludeModule('intec.startshop'))
                    $arModules[] = GetMessage('WIZARD_STEPS_STARTUP_MODULES_STARTSHOP');
                
                $this->content .= " (".implode(', ', $arModules).")";
            }  
            
            if (!$bModulesInstalled)
                $this->content .= '.</td>
    				</tr>
    			</table>';
            
        }    
    }

    class SelectSiteStep extends CSelectSiteWizardStep
    {
    	function InitStep()
    	{
    		parent::InitStep();
    
    		$wizard =& $this->GetWizard();
    		$wizard->solutionName = "intec_unimagazinlite";
            $this->SetPrevStep("startup");
    	}
    }
    
    class SelectTemplateStep extends CSelectTemplateWizardStep
    {
    	
    }
    
    class SelectThemeStep extends CSelectThemeWizardStep
    {
        function ShowStep()
    	{
    		$wizard =& $this->GetWizard();
    		$sThemesDirectory = $_SERVER['DOCUMENT_ROOT'].$wizard->GetPath().'/site/themes/';
    		$sThemesCutDirectory = $wizard->GetPath().'/site/themes/';
    		
    		$themes = scandir($sThemesDirectory);
    		array_shift($themes);
    		array_shift($themes);
    				
    		$this->content = '<div id="html_container">';
    			$this->content .= <<<SCRIPT
    				<script type="text/javascript">
    					function SelectTheme(element, solutionId, imageUrl)
    					{
    						var container = document.getElementById("solutions-container");
    						var anchors = container.getElementsByTagName("SPAN");
    						for (var i = 0; i < anchors.length; i++)
    						{
    							if (anchors[i].parentNode == container)
    								anchors[i].className = "inst-template-color";
    						}
    						element.className = "inst-template-color inst-template-color-selected";
    						var hidden = document.getElementById("selected-solution");
    						if (!hidden) 
    						{
    							hidden = document.createElement("INPUT");
    							hidden.type = "hidden"
    							hidden.id = "_wiz_themeID";
    							hidden.name = "selected-solution";
    							container.appendChild(hidden);
    						}
    						hidden.value = solutionId;
    
    						var preview = document.getElementById("solution-preview");
    						if (!imageUrl)
    							preview.style.display = "none";
    						else 
    						{
    							document.getElementById("solution-preview-image").src = imageUrl;
    							preview.style.display = "";
    						}
    					}
    				</script>
SCRIPT;
    			$this->content .= '<div class="inst-template-color-block" id="solutions-container">';
    				foreach ($themes as $theme)
    				{
    					$sThemeDirectory = $sThemesDirectory.$theme.'/';
    					$sThemeCutDirectory = $sThemesCutDirectory.$theme.'/';
    										
    					$this->content .= '<span class="inst-template-color" style="width: 20%;" ondblclick="SubmitForm(\'next\');" onclick="SelectTheme(this, \''.$theme.'\', \''.$sThemeCutDirectory.'screen.png\');">';
    						$this->content .= '<span class="inst-templ-color-img"><img src="'.$sThemeCutDirectory.'preview.png" border="0" class="solution-image" alt="" width="70" height="70"></span>';
    						$this->content .= '<span class="inst-templ-color-name">'.GetMessage('WIZARD_SITE_THEME_'.$theme).'</span>';
    					$this->content .= '</span>';
    					
    					unset($sThemeDirectory);
    				}
    				$this->content .= '<input type="hidden" name="__wiz_themeID" value="" id="selected-solution">';
    			$this->content .= '</div>';
    			$this->content .= '<div id="solution-preview">';
    				$this->content .= '<div class="solution-inner-item">';
    					$this->content .= '<b class="r3"></b>';
    					$this->content .= '<b class="r1"></b>';
    					$this->content .= '<b class="r1"></b>';
    					$this->content .= '<img src="" border="0" id="solution-preview-image" width="450" height="450" />';
    					$this->content .= '<b class="r1"></b>';
    					$this->content .= '<b class="r1"></b>';
    					$this->content .= '<b class="r3"></b>';
    				$this->content .= '</div>';
    			$this->content .= '</div>';
    		$this->content .= '</div>';
    	}
    	
    	function OnPostForm() {
    		$wizard =& $this->GetWizard();
    		
    		$themeID = $wizard->GetVar('themeID');
    		if (empty($themeID)) $this->SetError(GetMessage('WIZARD_STEPS_SELECT_THEME_ERROR'));
    	}
    }
    
    class SiteSettingsStep extends CSiteSettingsWizardStep
    {
        function InitStep()
    	{
    		$wizard =& $this->GetWizard();
    		$wizard->solutionName = "eshopintec_unimagazinlite";
    		parent::InitStep();
    
            $this->SetNextStep('data_install');
    		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
    		$this->SetTitle(GetMessage("WIZARD_STEPS_SETTINGS_TITLE"));
    
    		$siteID = $wizard->GetVar("siteID");
            
            $wizard->SetDefaultVars(array(
                "siteName" => GetMessage('WIZARD_SETTINGS_SITE_NAME'),
                "sitePhone" => GetMessage('WIZARD_SETTINGS_SITE_PHONE'),
                "siteAddress" => GetMessage('WIZARD_SETTINGS_SITE_ADDRESS'),
                "siteEmail" => GetMessage('WIZARD_SETTINGS_SITE_EMAIL'),
                "siteMetaDescription" => GetMessage('WIZARD_SETTINGS_SITE_META_DESCRIPTION'),
                "siteMetaKeywords" => GetMessage('WIZARD_SETTINGS_SITE_META_KEYWORDS')
            ));
        }
        
        function ShowStep()
    	{
    		$wizard =& $this->GetWizard();
    
            $arFields = array(
                "siteName" => array(
                    "NAME" => GetMessage('WIZARD_STEPS_SETTINGS_FIELDS_SITE_NAME'),
                    "TYPE" => "STRING"
                ),
                "sitePhone" => array(
                    "NAME" => GetMessage('WIZARD_STEPS_SETTINGS_FIELDS_SITE_PHONE'),
                    "TYPE" => "STRING"
                ),
                "siteAddress" => array(
                    "NAME" => GetMessage('WIZARD_STEPS_SETTINGS_FIELDS_SITE_ADDRESS'),
                    "TYPE" => "STRING"
                ),
                "siteEmail" => array(
                    "NAME" => GetMessage('WIZARD_STEPS_SETTINGS_FIELDS_SITE_EMAIL'),
                    "TYPE" => "STRING"
                ),
                "siteMetaDescription" => array(
                    "NAME" => GetMessage('WIZARD_STEPS_SETTINGS_FIELDS_SITE_META_DESCRIPTION'),
                    "TYPE" => "STRING"
                ),
                "siteMetaKeywords" => array(
                    "NAME" => GetMessage('WIZARD_STEPS_SETTINGS_FIELDS_SITE_META_KEYWORDS'),
                    "TYPE" => "STRING"
                )
            );
    
    		$this->content .= '<div class="wizard-input-form">';
            
            foreach ($arFields as $sKey => $arField)
            {
                if ($arField['TYPE'] == "STRING")
                    $this->content .= '
            		<div class="wizard-input-form-block">
            			<label for="'.$sKey.'" class="wizard-input-title">'.$arField['NAME'].'</label><br />
            			'.$this->ShowInputField('text', $sKey, array("id" => $sKey, "class" => "wizard-field")).'
            		</div>';
            }
            
            $this->content .= '</div>';
            
        }
    }
    
    class InstallStep extends CDataInstallWizardStep
    {
        
    }
    
    class FinishStep extends CFinishWizardStep
    {
    	function InitStep()
    	{
    		$this->SetStepID("finish");
    		$this->SetNextStep("finish");
    		$this->SetTitle(GetMessage("WIZARD_STEPS_FINISH_TITLE"));
    		$this->SetNextCaption(GetMessage("WIZARD_STEPS_FINISH_BUTTONS_NEXT"));  
    	}
    
    	function ShowStep()
    	{
    		$wizard =& $this->GetWizard();
    		
    		$siteID = WizardServices::GetCurrentSiteID($wizard->GetVar("siteID"));
    		$rsSites = CSite::GetByID($siteID);
    		$siteDir = "/"; 
    		if ($arSite = $rsSites->Fetch())
    			$siteDir = $arSite["DIR"]; 
    
    		$wizard->SetFormActionScript(str_replace("//", "/", $siteDir."/?finish"));
    
    		$this->CreateNewIndex();
    		
    		COption::SetOptionString("main", "wizard_solution", $wizard->solutionName, false, $siteID);
    
    		$this->content .=
    			'<table class="wizard-completion-table">
    				<tr>
    					<td class="wizard-completion-cell">'
    						.GetMessage("WIZARD_STEPS_FINISH_CONTENT").
    					'</td>
    				</tr>
    			</table>';
    	}
    }
?>