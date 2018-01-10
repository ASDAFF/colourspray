<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
	use Bitrix\Iblock;

	$arEmptyPreview = null;

	if (!empty($arResult['DETAIL_PICTURE']))
	{
		$arEmptyPreview = array();
		$arEmptyPreview['SRC'] = CFile::ResizeImageGet($arResult['DETAIL_PICTURE'], array('width' => 450, 'height' => 450), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		$arEmptyPreview['SRC'] = $arEmptyPreview['SRC']['src'];
	}
	else if (!empty($arResult['PREVIEW_PICTURE']))
	{
		$arEmptyPreview = array();
		$arEmptyPreview['SRC'] = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array('width' => 450, 'height' => 450), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
		$arEmptyPreview['SRC'] = $arEmptyPreview['SRC']['src'];
	}

	$arDefaultParams = array(

	);

	$arParams = array_merge($arDefaultParams, $arParams);
    
    $sComparePath = parse_url($arResult['COMPARE_URL']);
    $sComparePath = $sComparePath['path'];
    $arResult['COMPARE_REMOVE_URL'] = $sComparePath.'?'.$arParams['ACTION_VARIABLE'].'=DELETE_FROM_COMPARE_LIST&'.$arParams['PRODUCT_ID_VARIABLE'].'='.$arResult['ID'];

	$arResult['MORE_PHOTO'] = array();

	if (!empty($arParams['MORE_PICTURES_CODE']) || $arParams['MORE_PICTURES_CODE'] != '-')
	{
		$arMorePhoto = array();

		if (!empty($arEmptyPreview))
		{
			$arMorePhoto[] = $arEmptyPreview;
		}

		if (!empty($arResult['PROPERTIES'][$arParams['MORE_PICTURES_CODE']]['VALUE']))
		{
			foreach ($arResult['PROPERTIES'][$arParams['MORE_PICTURES_CODE']]['VALUE'] as $iPicture)
			{
				$arMorePhoto[] = array("SRC" => CFile::GetPath($iPicture));
			}
		}

		$arResult['MORE_PHOTO'] = $arMorePhoto;
	}

	$arResult['MORE_PHOTO_COUNT'] = count($arResult['MORE_PHOTO']);

	if (CModule::IncludeModule('intec.startshop'))
	{
		CStartShopTheme::ApplyTheme(SITE_ID);

		if ($_REQUEST['action'] == 'addtocart' && is_numeric($_REQUEST['count']))
		{
			CStartShopBasket::Add($arResult['ID'], array(), $_REQUEST['count']);
			LocalRedirect($APPLICATION->GetCurPageParam('', array('action', 'count')));
			return;
		}

		if (!empty($arResult['ID']))
		{
			$arCatalogItem = CStartShopCatalogProduct::GetByID($arResult['ID'], $arParams['CURRENCY'])->Fetch();

			if (!empty($arCatalogItem))
			{
				$arResult['CAN_BUY'] = $arCatalogItem['STARTSHOP']['CAN_BUY'] == "Y" ? true : false;
				$arResult['CATALOG_USE_QUANTITY'] = $arCatalogItem['STARTSHOP']['USES_QUANTITY'];
				$arResult['CATALOG_QUANTITY'] = $arCatalogItem['STARTSHOP']['QUANTITY'];
				$arResult['IN_CART'] = $arCatalogItem['STARTSHOP']['BASKET']['IN'];
				$arResult['MIN_PRICE'] = $arCatalogItem['STARTSHOP']['MIN_PRICE'];

				if (!empty($arParams['ARTICLE_PROPERTY_CODE']) || $arParams['ARTICLE_PROPERTY_CODE'] != '-')
				{
					$arResult['PROPERTIES']['CML2_ARTICLE'] = $arResult['PROPERTIES'][$arParams['ARTICLE_PROPERTY_CODE']];
				}
			}
		}
	}

	if (!empty($arResult['DISPLAY_PROPERTIES']))
	{
		foreach ($arResult['DISPLAY_PROPERTIES'] as $propKey => $arDispProp)
		{
			if ('F' == $arDispProp['PROPERTY_TYPE'])
				unset($arResult['DISPLAY_PROPERTIES'][$propKey]);
		}
	}
?>