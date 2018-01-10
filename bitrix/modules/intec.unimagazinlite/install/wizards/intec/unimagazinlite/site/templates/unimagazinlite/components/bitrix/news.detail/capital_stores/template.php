<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="stores">
<?//print_r($arResult);
$list = $arResult["LIST_PAGE_URL"];
$sectionid = $arResult["IBLOCK_SECTION_ID"];
?>
<a href="<?echo $list.$sectionid;?>" class="all_stores"><?echo GetMessage("ALL_STORES");?></a>

	

	
		

	<?/*if( !empty($arResult["PROPERTIES"]["MAP"]["VALUE"]) ){?>
		<div id="map_view" class="popup" style="display: block; opacity: 0;">
			<a href="" class="close_link close"></a>
			<div class="headerh3"><?=$arResult["NAME"]?></div>
			<?$coord = explode(",", $arResult["PROPERTIES"]["MAP"]["VALUE"]);
			$map_data = serialize( 
				array( 
					'google_lat' => $coord[0], 
					'google_lon' => $coord[1],
					'google_scale' => 16, 
					'PLACEMARKS' => array( 
						array( 
							'TEXT' => "реумнасл",
							'LAT' => $coord[0],
							'LON' => $coord[1], 
							'MARK' => "/bitrix/templates/techno/images/marker.png"
						), 
					),
				));?> 
			<?$APPLICATION->IncludeComponent("bitrix:map.google.view", "techno_stores_view", array(
				"INIT_MAP_TYPE" => "ROADMAP",
				"MAP_DATA" => $map_data,
				"MAP_WIDTH" => "800",
				"MAP_HEIGHT" => "400",
				"CONTROLS" => array(
					0 => "SMALL_ZOOM_CONTROL",
					1 => "TYPECONTROL",
					2 => "SCALELINE",
				),
				"OPTIONS" => array(
					0 => "ENABLE_DBLCLICK_ZOOM",
					1 => "ENABLE_DRAGGING",
					2 => "ENABLE_KEYBOARD",
				),
				"MAP_ID" => ""
				),
				false
			);?>
		</div>
	<?}*/?>
	<div class="description_store">
		
				<?=$arResult["DETAIL_TEXT"]?>
				<?if( !empty($arResult["PROPERTIES"]["PHONE"]["VALUE"]) ){?>
					<strong style="color: #000;"><?=GetMessage('PHONES')?></strong>
					<p><?=$arResult["PROPERTIES"]["PHONE"]["VALUE"]?></p>
				<?}?>
				<?if( !empty($arResult["PROPERTIES"]["EMAIL"]["VALUE"]) ){?>
					<strong style="color: #000;"><?=GetMessage('EMAIL')?></strong>
					<p><a href="mailto:<?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a></p>
				<?}?>
				
				<?if( count($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE_SMALL"] ) > 0 ){?>
					<ul class="mini_gallery">			
						<?foreach( $arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE_SMALL"] as $key => $arPhoto ){?>
							<li>
								<a class="fancy" href="<?=$arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"][$key]["SRC"]?>" rel="gallery_images">
									<img border="0" src="<?=$arPhoto["SRC"]?>" alt="" />
								</a>
							</li>
						<?}?>
					</ul>
				<?}?>
		
	</div>
	<?if( !empty($arResult["PROPERTIES"]["MAP"]["VALUE"]) ){?>
		<?$coord = explode(",", $arResult["PROPERTIES"]["MAP"]["VALUE"]);
		$map_data = serialize( 
			array( 
				'google_lat' => $coord[0], 
				'google_lon' => $coord[1],
				'google_scale' => 15, 
				'PLACEMARKS' => array( 
					array( 
						//'TEXT' => $arResult["NAME"],
						'LAT' => $coord[0],
						'LON' => $coord[1],
					), 
				),
			));?> 
		<?$APPLICATION->IncludeComponent(
			"bitrix:map.google.view",
			"",
			Array(
				"INIT_MAP_TYPE" => "ROADMAP",
				"MAP_DATA" => $map_data,
				"MAP_WIDTH" => "460",
				"MAP_HEIGHT" => "320",
				"CONTROLS" => array("SMALL_ZOOM_CONTROL","TYPECONTROL","SCALELINE"),
				"OPTIONS" => array("ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING","ENABLE_KEYBOARD"),
				"MAP_ID" => ""
			)
		);?>
	<?}?>

	
</div>
<div style="clear:both"></div>
<div class="description">
			<?$APPLICATION->IncludeFile(SITE_DIR."include/about_stores.php", Array(), Array(
					"MODE"      => "html",
					"NAME"      => "",
				)
			);?>
</div>