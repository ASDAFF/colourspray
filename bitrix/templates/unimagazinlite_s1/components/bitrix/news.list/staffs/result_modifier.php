<?
	$arSectionsID = array(); $arSections = array();
	foreach($arResult["ITEMS"] as $key => $arItem) { $arSectionsID[] = $arItem["IBLOCK_SECTION_ID"]; }
	$arSectionsID = array_unique($arSectionsID);
	
	$res = CIBlockSection::GetList( Array("SORT"=>"ASC"),Array("ID" => $arSectionsID ), true, Array("NAME", "ID"),false);
	while ($ar_fields = $res->GetNext())
	{
		$arSection = array();
		$arSection["ID"] = $ar_fields["ID"];
		$arSection["NAME"] = $ar_fields["NAME"];
		$arSections[] = $arSection;
	}
	
	foreach ($arSections as $sectionKey => $arSection)
	{
		foreach ($arResult["ITEMS"] as $itemKey => $arItem)
		{
			if ($arItem["IBLOCK_SECTION_ID"]==$arSection["ID"]) { $arSections[$sectionKey]["ITEMS"][] = $arItem; }
		}
	}
	
	unset($arResult["ITEMS"]);
	$arResult["SECTIONS"] = $arSections;

?>