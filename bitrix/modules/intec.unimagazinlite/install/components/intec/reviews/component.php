<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
	return;
	
$arReviews = array();

$display = (int)$arParams['DISPLAY_REVIEWS_COUNT'];
if ($arParams['DISPLAY_REVIEWS_COUNT'] < 0) $display = 3;

if (is_numeric($arParams['IBLOCK_ID']) && is_numeric($arParams['ELEMENT_ID']))
{
	$count = 0;
	$rsReviews = CIBLockElement::GetList(
		array(
			'ID' => 'DESC'
		),
		array(
			'IBLOCK_ID' => $arParams['IBLOCK_ID'],
			'ACTIVE' => 'Y',
			'PROPERTY_REVIEW' => $arParams['ELEMENT_ID']
		)
	);

	while ($rsReview = $rsReviews->GetNextElement())
	{
		$count++;
		
		$arReview = $rsReview->GetFields();
		$arReview['PROPERTIES'] = $rsReview->GetProperties();
		$arReviews[] = $arReview;
		
		if ($count >= $display)
		{
			break;
		}
	}
}

$arResult['ELEMENTS'] = $arReviews;

$this->IncludeComponentTemplate();
?>