<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
	use Bitrix\Main\Loader;

	if (!Loader::includeModule('iblock'))
		return;
	
	$section = !empty($arResult['SECTION_ID'])?$arResult['SECTION_ID']:false;
	$rsSections = CIBlockSection::GetList(array(), array('IBLOCK_TYPE' => $arParams['IBLICK_TYPE'], 'IBLOCK_ID' => $arParams['IBLOCK_ID'], 'SECTION_ID' => $arParams['SECTION_ID'], 'ACTIVE' => 'Y'));
	
	$arResult['SECTIONS'] = array();
	$allElements = array();
	
	while($rsSection = $rsSections->GetNextElement())
	{
		$arSection = $rsSection->GetFields();
		$arSection['ELEMENTS'] = array();
		
		$rsElements = CIBlockElement::GetList(array(), array('IBLOCK_TYPE' => $arParams['IBLICK_TYPE'], 'IBLOCK_ID' => $arParams['IBLOCK_ID'], 'SECTION_ID' => $arSection['ID'], 'ACTIVE' => 'Y'));
		
		while ($rsElement = $rsElements->GetNextElement())
		{
			$arElement = $rsElement->GetFields();
			$arElement['PROPERTIES'] = $rsElement->GetProperties();
			$allElements[] = $arElement;
			$arSection['ELEMENTS'][] = $arElement;
		}
		
		$arResult['SECTIONS'][] = $arSection;
	}
	
	if ($arParams['SECTION_ALL_ENABLED'] == 'Y') 
	{
		$notEmptySectionsount = 0;
		
		foreach ($arResult['SECTIONS'] as $arSection)
		{
			if (!empty($arSection['ELEMENTS']))
			{
				$notEmptySectionsount++;
			}
		}
		
		if ($notEmptySectionsount > 1)
		{
			array_unshift($arResult['SECTIONS'], array('NAME' => GetMessage('CONTACTS_ALL'), 'ELEMENTS' => $allElements, "ALL" => "Y"));
		}
	}
?>