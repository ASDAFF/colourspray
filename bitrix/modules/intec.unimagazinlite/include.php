<?
    IncludeModuleLangFile(__FILE__);
    
    class UniMagazinLite {
    	protected static $MODULE_ID = "intec.unimagazinlite";
		protected static $MODULE_STATE = 0;
        
		public static function InitProtection() {
			static::$MODULE_STATE = CModule::IncludeModuleEx(static::$MODULE_ID);
			static::CheckDemo();
		}
		
		protected static function CheckDemo() {
			if (static::$MODULE_STATE != 1 && static::$MODULE_STATE != 2)
				die(GetMessage('DEMO_PERIOD_END'));
		}
			
    	public static function ShowInclude($sSiteID){
    		global $APPLICATION, $SITE_THEME , $ADAPTIVE, $THEME_PANEL;
    		$SITE_THEME = strToLower(static::getOptionValue($sSiteID,"COLOR_THEME"));
    		$THEME_PANEL = COption::GetOptionString(static::$MODULE_ID, "THEME_PANEL", "", $sSiteID);
			
			static::CheckDemo();
    		
			$APPLICATION->AddHeadString("<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>",true);
			$APPLICATION->AddHeadString("<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>",true);
			$APPLICATION->AddHeadString("<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>",true);
			
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/fonts/font-awesome/css/font-awesome.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/fonts.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/normalize.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/main.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/jqzoom.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/grid.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/controls.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/color.css');
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/select2/select2.css');
			
			CJSCore::Init(array("jquery"));
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-ui-1.9.2.custom.min.js');	
			//bx-slider	
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.bxslider.min.js");	
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/jquery.bxslider.css');
			//mask
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.maskedinput.min.js");	
			//zoomer
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.zoom.min.js");
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.picZoomer.js");
			//elastic_slider
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.flexisel.js");
			//fancy_box
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.css?v=2.1.5');
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.pack.js?v=2.1.5');
			//zoomer
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.spritezoom.js");
			//select2
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/select2/select2.full.js");
			//template_script
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/uni.js");	
			$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/script.js");	
			
			$APPLICATION->AddHeadString('<style type="text/css">'.static::MakeCss($sSiteID).'</style>');
			return true;
    	}
    
    	public static function setOption($sSiteID, $sName, $sValue, $bAll = false){
    		static::CheckDemo();
			
			global $USER;
    		
    		if ($USER->IsAdmin() || $bAll == true) {
    			COption::SetOptionString(static::$MODULE_ID, $sName, $sValue, false, $sSiteID);
    		}else{
    			$_SESSION["Settings"][$sSiteID][$sName] = $sValue;
    		}
    	}
    	
    	public static function getGlobalOptions() {
			static::CheckDemo();
    		return include('sources/Settings.php');
    	}
    	
    	public static function getOptionsValue($sSiteID) {
			static::CheckDemo();
    		$arOptions = static::getGlobalOptions();	
            	
    		foreach($arOptions as $sKey => $arOption){
    			global $USER;
                
                $sValue = COption::GetOptionString(static::$MODULE_ID, $sKey, "", $sSiteID);
                
    			if (!empty($_SESSION["Settings"][$sSiteID][$sKey])) {
                    $sValue = $_SESSION["Settings"][$sSiteID][$sKey];				
    			}
                
                if (empty($sValue))
                    $sValue = $arOptions[$sKey]["DEFAULT_VALUE"];
                    
                $arOptions[$sKey]["ACTIVE_VALUE"] = $sValue;
    		}
            
    		return $arOptions;
    	}
        
        public static function resetOptionsValue($sSiteID = false) {
			static::CheckDemo();
            global $USER;
            
            if ($USER->IsAdmin()) {
                COption::RemoveOption(static::$MODULE_ID, "", $sSiteID);
            } else {
                if (!empty($sSiteID)) {
                    unset($_SESSION["Settings"][$sSiteID]);
                } else {
                    unset($_SESSION["Settings"]);
                }
            }
        }
    	
    	public static function getOptionValue($sSiteID, $sKey) {
			static::CheckDemo();
    		global $USER;
            
            $sGlobalOptions = static::getGlobalOptions();
            
            $sValue = COption::GetOptionString(static::$MODULE_ID, $sKey, "", $sSiteID);
            
            if (!empty($_SESSION["Settings"][$sSiteID][$sKey])) {
                $sValue = $_SESSION["Settings"][$sSiteID][$sKey];				
			}
            
            if (empty($sValue))
                $sValue = $sGlobalOptions[$sKey]['DEFAULT_VALUE'];
                
            return $sValue;
    	}
    	
    	public static function MakeCss($sSiteID){
			static::CheckDemo();
    		global $SITE_THEME, $TEMPLATE_OPTIONS;
            
    		if(!class_exists('lessc')){
    			include_once ('sources/Less.php');
    		}
            
    		$oLessc = new lessc;
    		$sSiteTheme = $SITE_THEME;
            
            if ($sSiteTheme == 'custom' || empty($sSiteTheme)) {
                $sCustomColor = static::getOptionValue($sSiteID, "CUSTOM_COLOR");	
            } else {
                $arOptions = static::getOptionsValue($sSiteID);
                $arTheme = $arOptions['COLOR_THEME']['VALUE'][$arOptions['COLOR_THEME']['ACTIVE_VALUE']];
                $sCustomColor = $arTheme['VALUE'];
            }
    		  
    		$oLessc->setVariables(array(
    			'bcolor' => $sCustomColor
    		));
			
            if (static::$MODULE_STATE != 1)
				include('sources/StartShopTheme.php');
            
			if (static::$MODULE_STATE == 1)
				if (CModule::IncludeModule('intec.startshop'))
					CStartShopTheme::SetColors(array(
						'COLOR' => $sCustomColor,
						'COLOR_DARK' => CStartShopVariables::$THEME_COLORS['COLOR_DARK']['DEFAULT'],
						'COLOR_INPUT_TEXT_STANDARD_COLOR' => CStartShopVariables::$THEME_COLORS['COLOR_INPUT_TEXT_STANDARD_COLOR']['DEFAULT'],
						'COLOR_INPUT_TEXT_STANDARD_BACKGROUND' => CStartShopVariables::$THEME_COLORS['COLOR_INPUT_TEXT_STANDARD_BACKGROUND']['DEFAULT'],
					), SITE_ID);
			
    		$sThemePath = $_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/themes/'.strToLower($sSiteTheme).'/';
    		if(!is_dir($sThemePath))
    			mkdir($sThemePath, 0755, true);
                
            if (is_dir($sThemePath))
                return $oLessc->compile(file_get_contents(dirname(__FILE__).'/styles/theme.less'));	
    	}
    	
    	public static function AdmSettingsDrawRow_EX ($sKey, $arOption, $sSiteID = false) {
			static::CheckDemo();
            $sInputKey = !empty($sSiteID) ? $sKey.'_'.$sSiteID : $sKey;
    		switch ($arOption['TYPE']) {
                case 'caption' : {
                    ?>
                        <tr class="heading">
                            <td colspan="2"><?=$arOption['LANG']?></td>
                        </tr>
                    <?
                    break;
                }
                case 'checkbox' : {
                    ?>
                        <tr>
                            <td class="adm-detail-content-cell-l" style="width: 50%;">
                                <?=$arOption['LANG']?>
                            </td>
                            <td class="adm-detail-content-cell-r">
                                <input type="hidden" name="<?=$sInputKey?>" value="N" />
                                <input type="checkbox" name="<?=$sInputKey?>" value="Y"<?=$arOption['ACTIVE_VALUE'] == 'Y' ? ' checked="checked"' : ''?> />
                            </td>
                        </tr>
                    <?
                    break;
                }
                case 'selectbox' : {
                    ?>
                        <tr>
                            <td class="adm-detail-content-cell-l" style="width: 50%;">
                                <?=$arOption['LANG']?>
                            </td>
                            <td class="adm-detail-content-cell-r">
                                <input type="hidden" name="<?=$sInputKey?>" value="<?=htmlspecialcharsbx($arOption['DEFAULT_VALUE'])?>" />
                                <select name="<?=$sInputKey?>">
                                    <?foreach ($arOption['VALUE'] as $sValueKey => $arValue):?>
                                        <option value="<?=htmlspecialcharsbx($sValueKey)?>"<?=$sValueKey == $arOption['ACTIVE_VALUE'] ? ' selected="selected"' : ''?>><?=$arValue['NAME']?></option>
                                    <?endforeach?>
                                </select>
                            </td>
                        </tr>
                    <?
                    break;
                }
                case 'text' : {
                    ?>
                        <tr>
                            <td class="adm-detail-content-cell-l" style="width: 50%;">
                                <?=$arOption['LANG']?>
                            </td>
                            <td class="adm-detail-content-cell-r">
                                <input type="hidden" name="<?=$sInputKey?>" value="<?=htmlspecialcharsbx($arOption['DEFAULT_VALUE'])?>" />
                                <input type="text" name="<?=$sInputKey?>" value="<?=htmlspecialcharsbx($arOption['ACTIVE_VALUE'])?>" />
                            </td>
                        </tr>
                    <?
                    break;
                }
    		}
    	}
    	
    	public static function AdmSettingsSaveOption_EX($sKey, $arOption, $sSiteID = false) {
			static::CheckDemo();
    		$sInputKey = !empty($sSiteID) ? $sKey.'_'.$sSiteID : $sKey;
    		switch ($arOption['TYPE']) {
                case 'checkbox' : {
                    $sValue = 'N';
                    
                    if ($_REQUEST[$sInputKey] == 'Y')
                        $sValue = 'Y';
                        
                    self::setOption($sSiteID, $sKey, $sValue);
                        
                    break;
                }
                case 'selectbox' : {
                    $sValue = $arOption['DEFAULT_VALUE'];
                    
                    if (key_exists($_REQUEST[$sInputKey], $arOption['VALUE']))
                        $sValue = $_REQUEST[$sInputKey];
                        
                    self::setOption($sSiteID, $sKey, $sValue);
                        
                    break;
                }
                case 'text' : {
                    $sValue = $_REQUEST[$sInputKey];
                    
                    self::setOption($sSiteID, $sKey, $sValue);
                        
                    break;
                }
    		}
    	}
    	
    	public static function IsCompositeEnabled() {
			static::CheckDemo();
    		if(class_exists("CHTMLPagesCache"))
    			if(method_exists("CHTMLPagesCache", "GetOptions"))
    				if($arHTMLCacheOptions = CHTMLPagesCache::GetOptions())
    					if($arHTMLCacheOptions["COMPOSITE"] == "Y")
    						return true;

    		return false;
    	}
    	
    	public static function EnableComposite(){
			static::CheckDemo();
    		if(class_exists("CHTMLPagesCache"))
    			if(method_exists("CHTMLPagesCache", "GetOptions"))
    				if($arHTMLCacheOptions = CHTMLPagesCache::GetOptions()){
    					$arHTMLCacheOptions["COMPOSITE"] = "Y";
    					CHTMLPagesCache::SetEnabled(true);
    					CHTMLPagesCache::SetOptions($arHTMLCacheOptions);
    					bx_accelerator_reset();
    				}
    	}
    }
?>