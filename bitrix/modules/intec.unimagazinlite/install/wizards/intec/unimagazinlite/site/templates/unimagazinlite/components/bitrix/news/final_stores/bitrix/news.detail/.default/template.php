<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="stores">
	<?$list = $arResult["LIST_PAGE_URL"];
	$sectionid = $arResult["IBLOCK_SECTION_ID"];?>
	<a href="<?echo $list.$sectionid;?>" class="all_stores"><?echo GetMessage("ALL_STORES");?></a>
	<div class="description_store">
		<?if( !empty($arResult["PROPERTIES"]["ADDRESS"]["VALUE"]) ){?>
			<strong ><?=GetMessage('ADDRESS')?></strong>
			<p><?=$arResult["PROPERTIES"]["ADDRESS"]["VALUE"]?></p>
			<div class="dotted_line"></div>
		<?}?>
		<?if( !empty($arResult["PROPERTIES"]["GRAFIC"]["VALUE"]) ){?>
			<strong ><?=GetMessage('GRAFIC')?></strong>
			<p><?=$arResult["PROPERTIES"]["GRAFIC"]["VALUE"]?></p>
			<div class="dotted_line"></div>
		<?}?>
		<?if( !empty($arResult["PROPERTIES"]["PHONE"]["VALUE"]) ){?>
			<strong ><?=GetMessage('PHONES')?></strong>
			<p><?=$arResult["PROPERTIES"]["PHONE"]["VALUE"]?></p>
			<div class="dotted_line"></div>
		<?}?>
		<?if( !empty($arResult["PROPERTIES"]["EMAIL"]["VALUE"]) ){?>
			<strong ><?=GetMessage('EMAIL')?></strong>
			<p><a href="mailto:<?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?>"><?=$arResult["PROPERTIES"]["EMAIL"]["VALUE"]?></a></p>
			<div class="dotted_line"></div>
		<?}?>		
		<?if( count($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE_SMALL"] ) > 0 ){?>
			<strong style="margin-bottom:10px;"><?=GetMessage('PHOTOS')?></strong>
			<div class="dotted_line"></div>
			<ul class="mini_gallery_store clearfix">			
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
	<?if(!empty($arResult["PROPERTIES"]["MAP"]["VALUE"]) ){?>
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
	<div class="clear"></div>
	<div class="detail">
		<?=$arResult["DETAIL_TEXT"]?>
	</div>
</div>
