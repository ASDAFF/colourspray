<?
	$reviewsCount = 4;
	if (is_numeric($arParams['REVIEWS_COUNT'])) $reviewsCount = (int) $arParams['REVIEWS_COUNT'];
?>
<?$APPLICATION->IncludeComponent(
	"intec:reviews", 
	"reviews", 
	array(
		"IBLOCK_TYPE" => $arParams['REVIEWS_IBLOCK_TYPE'],
		"IBLOCK_ID" => $arParams['REVIEWS_IBLOCK_ID'],
		"ELEMENT_ID" => $arResult['ID'],
		"DISPLAY_REVIEWS_COUNT" => $reviewsCount
	),
	$component
);?>