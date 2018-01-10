<?
    $arPointsData = array();
    
    foreach ($arResult['ELEMENTS'] as $arElement)
    {
        $arPointData = array();
        
        if (!empty($arElement['PROPERTIES']['MAP']['VALUE']))
		{
			$arPointData['NAME'] = $arElement['PROPERTIES']['ADDRESS']['VALUE'];
			$arPointData['COORDINATES'] = explode(',', $arElement['PROPERTIES']['MAP']['VALUE']);
            $arPointsData[] = $arPointData;
		}
    }
    
    if (!empty($arPointsData))
    {
        $arMapData = array(
            "yandex_lat" => $arPointsData[0]['COORDINATES'][0],
    		"yandex_lon" => $arPointsData[0]['COORDINATES'][1],
    		"yandex_scale" => "10",
    		"PLACEMARKS" => Array()
        );
        
        foreach ($arPointsData as $arPointData)
        {
            $arMapData['PLACEMARKS'][] = array(
				"TEXT" => $arPointData['NAME'],
				"LON" => $arPointData['COORDINATES'][1],
				"LAT" => $arPointData['COORDINATES'][0],
			);
        }
    }
    
    $arResult['MAP_DATA'] = serialize($arMapData);
?>