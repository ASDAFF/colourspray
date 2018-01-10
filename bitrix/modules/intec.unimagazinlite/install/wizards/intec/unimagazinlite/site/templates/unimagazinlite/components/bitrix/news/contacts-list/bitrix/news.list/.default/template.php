<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?

$existElements = false;
	$coordinats=array();
	$addrs=array();
	
	foreach($arResult['SECTIONS'][0]['ELEMENTS'] as $elem){
		if (!empty($elem['PROPERTIES']['MAP']['VALUE']))
		{
			$addrs[] = $elem['PROPERTIES']['ADDRESSLOCALITY']['VALUE'].', '.$elem['PROPERTIES']['STREETADDRESS']['VALUE'];
			$coordinats[] = explode(',', $elem['PROPERTIES']['MAP']['VALUE']);
			
		}
		
	}
	
	$mapData = array(
		"yandex_lat" => $coordinats[0][0],
		"yandex_lon" => $coordinats[0][1],
		"yandex_scale" => $arResult['SECTIONS'][0]['ALL'] == 'Y'?"6":"4",
		"PLACEMARKS" => Array()
	);
	
	foreach($coordinats as $key => $coord)
	{
		$mapData['PLACEMARKS'][] = array(
			"TEXT" => $addrs[$key],
			"LON" => $coord[1],
			"LAT" => $coord[0],
		);
	}
	
	$mapData = serialize($mapData);
						
	?>
					<div id="mp-yandex" class="map-yandex">
						<?$APPLICATION->IncludeComponent(
						   "bitrix:map.yandex.view",
						   "",
						   Array(
							  "INIT_MAP_TYPE" => "MAP",
							  "MAP_DATA" => $mapData,
							  "MAP_WIDTH" => "AUTO",
							  "MAP_HEIGHT" => "500",
							  "CONTROLS" => Array("TOOLBAR", "ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
							  "OPTIONS" => Array(/*"ENABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", */"ENABLE_DRAGGING"),
							  "MAP_ID" => ""
						   )
						);?>
					</div>
					<div id="correctdiv">
					</div>
					<script>
						$("#correctdiv").height($("#mp-yandex").height());
						
					</script>
	
	<?
	
foreach ($arResult['SECTIONS'] as $arSection){
	if (!empty($arSection['ELEMENTS']))
		$existElements = true;
}

?>
<div class="contacts uni-tabs" id="tabs">
	
	<div class="clear"></div>
				
				<?
				$work_title= $arResult['SECTIONS'][0]['ELEMENTS'][0]["PROPERTIES"]["WORK"]["NAME"];
				$work_value=$arResult['SECTIONS'][0]['ELEMENTS'][0]["PROPERTIES"]["WORK"]["VALUE"];
			
				
				?>
				<?foreach ($arResult['SECTIONS'][0]['ELEMENTS'] as $arElement):?>
					<div class="section uni_parent_col" style="margin-left: -30px; margin-right: -30px;" id="section<?=$arSection['ID']?>">
					<?
						
						
						$picture = SITE_TEMPLATE_PATH.'/images/noimg/noimg_minquadro.jpg';
						
						if (!empty($arElement['PREVIEW_PICTURE']))
						{
							$picture_file = CFile::ResizeImageGet($arElement['PREVIEW_PICTURE'], array('width' => 116, 'height' => 116), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
							if ($picture_file)
							{
								$picture = $picture_file['src'];
							}
							else 
							{
								$picture = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
							}
						}
					?>
					
						<a  href="<?=$arElement['DETAIL_PAGE_URL']?>" class="element uni_col uni-10">
							<div class="image">
								<div class="valign"></div>
								<img src="<?=$picture?>" />
							</div>
						
						</a>
						<div class="rubb">
						<div class="information">
							<a class="dec_none" href="<?=$arElement['DETAIL_PAGE_URL']?>">
								<div class="address"><?=$arElement['PROPERTIES']['ADDRESSLOCALITY']['VALUE'].',<br>'.$arElement['PROPERTIES']['STREETADDRESS']['VALUE']?></div>
						 	</a>
						</div>
						<div class="schedule">
							<div class="work-value"><?=$arElement["PROPERTIES"]["WORK"]["~VALUE"]?></div>
						</div>
						<div class="phone-email">
							<div class="phone">
							<?if (is_array($arElement['PROPERTIES']['PHONES']['VALUE'])) {?>
								<?foreach ($arElement['PROPERTIES']['PHONES']['VALUE'] as $arPhone){?>
									<a class="dec_none" rel="nofollow" href="tel:<?=$arPhone?>"><?=$arPhone?></a>
								<?}?>
							<?}else{?>
								<a class="dec_none" rel="nofollow" href="tel:<?=$arElement['PROPERTIES']['PHONES']['VALUE']?>"><?=$arElement['PROPERTIES']['PHONES']['VALUE']?></a>
							<?}?>
							</div>
							<div class="email"><a class="dec_none" rel="nofollow" href="mailto:<?=$arElement['PROPERTIES']['EMAIL']['VALUE']?>"><?=$arElement['PROPERTIES']['EMAIL']['VALUE']?></a></div>
						</div>
					
						<div class="clear"></div>
						</div>
					</div>
					
				<?endforeach;?>
				
	
</div>
<script type="text/javascript">
	//$("#tabs").tabs();
</script>
