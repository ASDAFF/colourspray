<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<ul class="breadcrumb-navigation">';

if (CModule::IncludeModule('iblock')) { 
	$arSec = array();
    $res = CIBlockSection::GetList(array(), array('IBLOCK_TYPE' => 'catalog', 'IBLOCK_ID'=>"12", 'ACTIVE'=>'Y'));
	while ($el = $res->GetNext()) {
		
		$arSec[$el['SECTION_PAGE_URL']]['ID']= $el['ID'];
		$arSec[$el['SECTION_PAGE_URL']]['DEPTH_LEVEL']= $el['DEPTH_LEVEL'];
		$arSec[$el['SECTION_PAGE_URL']]['IBLOCK_SECTION_ID']= $el['IBLOCK_SECTION_ID'];
		$arSec[$el['SECTION_PAGE_URL']]['NAME']= $el['NAME'];
	}
}



for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
	if($index > 0)
		$strReturn .= '<li><span>&nbsp;-&nbsp;</span></li>';

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	
	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1) {
			$GroupID = 0;
			foreach ($arSec as $link=>$value) {
				if ($arResult[$index]["LINK"] == $link) {
					$GroupID = $value['ID'];
				}
			}
			$strGroup ="";
			if (!empty($GroupID)) {
				foreach ($arSec as $link=>$value) {
					if ($value['IBLOCK_SECTION_ID'] == $GroupID) {
						$strGroup.= '<a class="hover_link" href="'.$link.'">'.$value['NAME'].'</a>';
					}
				}
			}
			
			if (!empty($strGroup)) {
				$strReturn .= '<li><a class="hover_link" href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a><div class="bn_space"></div><div class="dropdown_wrap"><div class="dropdown">'.$strGroup.'</div></div></li>';
			} else {
				$strReturn .= '<li><a class="hover_link" href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
			}
	} else {
		$strReturn .= '<li>'.$title.'</li>';
	}
}

$strReturn .= '</ul>';
return $strReturn;
?>
