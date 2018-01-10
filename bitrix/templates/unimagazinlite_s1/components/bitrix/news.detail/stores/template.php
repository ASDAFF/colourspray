<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<table width="100%" cellspacing="0" cellpadding="0" border="0" class="stores">
<tr><td>
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
				"MAP_WIDTH" => "420",
				"MAP_HEIGHT" => "290",
				"CONTROLS" => array("SMALL_ZOOM_CONTROL","TYPECONTROL","SCALELINE"),
				"OPTIONS" => array("ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING","ENABLE_KEYBOARD"),
				"MAP_ID" => ""
			)
		);?>
	<?}?>

	<?if( count($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE_SMALL"] ) > 0 ){?>
		<ul class="mini_gallery">			
			<?foreach( $arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE_SMALL"] as $key => $arPhoto ){?>
				<li><a class="fancy" href="<?=$arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"][$key]["SRC"]?>" rel="gallery_images"><img border="0" src="<?=$arPhoto["SRC"]?>" alt="" /></a></li>
			<?}?>
		</ul>
	<?}?>
		

	<?if( !empty($arResult["PROPERTIES"]["MAP"]["VALUE"]) ){?>
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
	<?}?>
	
	<table class="shop_description_mini" width="100%"><tr>
	<td>
		<?=$arResult["DETAIL_TEXT"]?>
	</td><td>
		<?if( !empty($arResult["PROPERTIES"]["PHONE"]["VALUE"]) ){?>
			<strong style="color: #000;"><?=GetMessage('PHONES')?></strong>
			<p><?=$arResult["PROPERTIES"]["PHONE"]["VALUE"]?></p>
		<?}?>
		<?if( !empty($arResult["PROPERTIES"]["EMAIL"]["VALUE"]) ){?>
			<strong style="color: #000;"><?=GetMessage('EMAIL')?></strong>
			<p><a href="mailto:<?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a></p>
		<?}?>	
	</td></tr></table>
	

</td><td class="right">
	<div class="desc_col_wr">
		<div class="description">
			<?$APPLICATION->IncludeFile(SITE_DIR."include/about_stores.php", Array(), Array(
					"MODE"      => "html",
					"NAME"      => "",
				)
			);?>
		</div>
		<div class="right_col">
			<?if( !empty($arResult["PROPERTIES"]["PHONE"]["VALUE"]) ){?>
				<strong style="color: #000;"><?=GetMessage('PHONES')?></strong>
				<p><?=$arResult["PROPERTIES"]["PHONE"]["VALUE"]?></p>
			<?}?>
			<?if( !empty($arResult["PROPERTIES"]["EMAIL"]["VALUE"]) ){?>
				<strong style="color: #000;"><?=GetMessage('EMAIL')?></strong>
				<p><a href="mailto:<?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a></p>
			<?}?>
		</div>
		<div class="left_col">
			<?=$arResult["DETAIL_TEXT"]?>
		</div>
	</div>
</td></tr></table>