<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
    global $APPLICATION;

    $arDefaultParams = array(
        "IBLOCK_ID" => "",
        "IBLOCK_ELEMENT_NAME" => "",
        "ACTION_VARIABLE" => "action",
        "PROPERTY_PREFIX" => "FEEDBACK",
        "USE_CAPTCHA" => "N",
		"USE_MAIL" => "N",
		"MAIL_EVENT" => "",
    );
    
    $arParams = array_merge($arDefaultParams, $arParams);
    $arResult = array();
    
    $arAvailableActions = array('form', 'send');
    $sAction = $_REQUEST[$arParams['ACTION_VARIABLE']];
    reset($arAvailableActions);
    
    if (!in_array($sAction, $arAvailableActions)) $sAction = current($arAvailableActions);
    
    if (CModule::IncludeModule('iblock'))
    {      
        if (!empty($arParams['IBLOCK_ID']))
        {
            $arProperties = array();
            $dbProperties = CIBlock::getProperties($arParams['IBLOCK_ID']);
            
            while ($arProperty = $dbProperties->GetNext())
                $arProperties[] = $arProperty;
            
            if (empty($arProperties)) $sAction = 'error';
            
            $arFields = array();
            
            if ($sAction != 'error')
                foreach($arProperties as $arProperty)
                    if (preg_match('/^('.preg_quote($arParams['PROPERTY_PREFIX']).').*/', $arProperty['CODE']))
                        $arFields[$arProperty['CODE']] = $arProperty;
            
            $arResult['FIELDS'] = $arFields;
            
            if ($arParams['USE_CAPTCHA'] == 'Y')
            {
                $arResult['CAPTCHA'] = array();
                $arResult['CAPTCHA']['SID'] = $APPLICATION->CaptchaGetCode();
                $arResult['CAPTCHA']['IMAGE'] = '/bitrix/tools/captcha.php?captcha_sid='.$arResult['CAPTCHA']['SID'];
            }
            
            if ($sAction == 'send') 
            {
                $bRequiredEmpty = false;
                $bCaptcha = true;
                
                foreach ($arFields as $arField)
                    if ($arField['IS_REQUIRED'] == 'Y' && empty($_REQUEST[$arField['CODE']]))
                    {
                        $bRequiredEmpty = true;
                        break;
                    }
                
                if ($arParams['USE_CAPTCHA'] == 'Y')
                    if (!$APPLICATION->CaptchaCheckCode($_REQUEST["CAPTCHA_WORD"], $_REQUEST["CAPTCHA_SID"]))
                        $bCaptcha = false;
                    
                if (!$bRequiredEmpty && $bCaptcha)
                {
                    $arPropertyValues = array();
					$arMailValues = array();
                    
					foreach ($arResult['FIELDS'] as $arField) {
						if (SITE_CHARSET == 'windows-1251')
                        {
							$sFieldsValue = iconv('UTF-8', 'WINDOWS-1251', $_REQUEST[$arField['CODE']]);
                        }
                        else
                        {
                            $sFieldsValue = $_REQUEST[$arField['CODE']];
                        }

						$arPropertyValues[$arField['ID']] = $sFieldsValue;
						$arMailValues[$arField['CODE']] = $sFieldsValue;
					}

                            
                    
                    $oIBLockElement = new CIBlockElement();
                    $oIBLockElement->Add(array(
                        "NAME" => $arParams['IBLOCK_ELEMENT_NAME'],
                        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                        "PROPERTY_VALUES" => $arPropertyValues
                    ));

					if ($arParams['USE_MAIL'] == 'Y' && !empty($arParams['MAIL_EVENT'])) {
						$oEvent = new CEvent();
						$oEvent->Send($arParams['MAIL_EVENT'], SITE_ID, $arMailValues, "N");
					}
                }
                
                if ($bRequiredEmpty) 
                    $sAction = 'emptyFields';
                    
                if (!$bCaptcha) 
                    $sAction = 'wrongCaptcha'; 
            }
        }        
    }
    else
    {
        $sAction = 'error';
    }
    
    $arResult['ACTION'] = $sAction;
    $arResult['FORM_URL'] = $APPLICATION->GetCurPage().'?'.$arParams['ACTION_VARIABLE'].'=form';
    $arResult['SEND_URL'] = $APPLICATION->GetCurPage().'?'.$arParams['ACTION_VARIABLE'].'=send';
    
    $this->IncludeComponentTemplate();
?>