<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult['ITEMS'] as $key => $item)
{
	$rsElement = CIBlockElement::GetByID($item['PRODUCT_ID'])->GetNextElement();
	
	if ($rsElement)
	{
		$arElement = $rsElement->GetFields();
		$arElement['PROPERTIES'] = $rsElement->GetProperties();
		
		if (CModule::IncludeModule('catalog'))
		{
			$arElement = array_merge($arElement, CCatalogProduct::GetByID($arElement['ID']));
			$rsRatios = CCatalogMeasureRatio::getList(
				array(),
				array('PRODUCT_ID' => $arElement['ID']),
				false,
				false,
				array('PRODUCT_ID', 'RATIO')
			);
			
			$sRatio = 1;
			
			if ($arRatio = $rsRatios->Fetch())
			{
				$intRatio = (int)$arRatio['RATIO'];
				$dblRatio = doubleval($arRatio['RATIO']);
				$sRatio = ($dblRatio > $intRatio ? $dblRatio : $intRatio);
			}
			
			$arElement['MEASURE_RATIO'] = $sRatio;
		}
			
		$arResult['ITEMS'][$key]['PRODUCT'] = $arElement;
		
		if (!empty($arElement['PROPERTIES']['CML2_LINK']['VALUE']) && empty($arElement['PREVIEW_PICTURE']) && empty($arElement['DETAIL_PICTURE']))
		{
			$arLinkElement = CIBlockElement::GetByID($arElement['PROPERTIES']['CML2_LINK']['VALUE'])->GetNext();
			
			if ($arLinkElement) {
				if ($arLinkElement['PREVIEW_PICTURE'])
				{
					$CFile = CFile::GetFileArray($arLinkElement['PREVIEW_PICTURE']);
					$arResult['ITEMS'][$key]['PREVIEW_PICTURE'] = $CFile;
					$arElement['PREVIEW_PICTURE'] = $CFile;
				}
				
				if ($arLinkElement['DETAIL_PICTURE'])
				{
					$CFile = CFile::GetFileArray($arLinkElement['DETAIL_PICTURE']);
					$arResult['ITEMS'][$key]['DETAIL_PICTURE'] = $CFile;
					$arElement['DETAIL_PICTURE'] = $CFile;
				}
			}
		}
		else
		{
			if ($arElement['PREVIEW_PICTURE'])
			{
				$CFile = CFile::GetFileArray($arElement["PREVIEW_PICTURE"]);
				$arResult['ITEMS'][$key]['PREVIEW_PICTURE'] = $CFile;
				$arElement['PREVIEW_PICTURE'] = $CFile;
			}
			
			if ($arElement['DETAIL_PICTURE'])
			{
				$CFile = CFile::GetFileArray($arElement["DETAIL_PICTURE"]);
				$arResult['ITEMS'][$key]['DETAIL_PICTURE'] = $CFile;
				$arElement['DETAIL_PICTURE'] = $CFile;
			}
		}
	}
}
?>