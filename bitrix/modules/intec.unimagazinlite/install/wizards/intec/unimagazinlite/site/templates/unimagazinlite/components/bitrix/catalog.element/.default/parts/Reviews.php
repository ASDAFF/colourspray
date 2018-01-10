<?$APPLICATION->IncludeComponent(
	"intec:reviews", 
	"reviews", 
	array(
		"IBLOCK_TYPE" => $arParams['REVIEWS_IBLOCK_TYPE'],
		"IBLOCK_ID" => $arParams['REVIEWS_IBLOCK_ID'],
		"ELEMENT_ID" => $arResult['ID'],
		"DISPLAY_REVIEWS_COUNT" => $arParams['REVIEWS_MESSAGES_PER_PAGE']
	),
	false
);?>