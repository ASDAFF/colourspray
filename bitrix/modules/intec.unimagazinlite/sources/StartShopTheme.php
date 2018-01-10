<?
	$sSiteID = SITE_ID;
	$sSiteTheme = strToLower(static::getOptionValue($sSiteID,"COLOR_THEME"));
	
	if ($sSiteTheme == 'custom' || empty($sSiteTheme)) {
		$sCustomColor = static::getOptionValue($sSiteID, "CUSTOM_COLOR");	
	} else {
		$arOptions = static::getOptionsValue($sSiteID);
		$arTheme = $arOptions['COLOR_THEME']['VALUE'][$arOptions['COLOR_THEME']['ACTIVE_VALUE']];
		$sCustomColor = $arTheme['VALUE'];
	}
	
	if (CModule::IncludeModule('intec.startshop'))
		CStartShopTheme::SetColors(array(
			'COLOR' => $sCustomColor,
			'COLOR_DARK' => CStartShopVariables::$THEME_COLORS['COLOR_DARK']['DEFAULT'],
			'COLOR_INPUT_TEXT_STANDARD_COLOR' => CStartShopVariables::$THEME_COLORS['COLOR_INPUT_TEXT_STANDARD_COLOR']['DEFAULT'],
			'COLOR_INPUT_TEXT_STANDARD_BACKGROUND' => CStartShopVariables::$THEME_COLORS['COLOR_INPUT_TEXT_STANDARD_BACKGROUND']['DEFAULT'],
		), SITE_ID);
?>