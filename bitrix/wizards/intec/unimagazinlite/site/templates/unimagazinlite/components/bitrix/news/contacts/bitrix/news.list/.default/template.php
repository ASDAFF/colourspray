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
foreach ($arResult['SECTIONS'] as $arSection){
	if (!empty($arSection['ELEMENTS']))
		$existElements = true;
}

if ($arParams['TITLE'] && count($arResult['SECTIONS']) > 0 && $existElements):?>
	<div class="contacts-title"><?=$arParams['TITLE']?></div>
	<div class="uni-indents-vertical indent-30"></div>
<?endif;?>
<div class="contacts uni-tabs" id="tabs">
	<ul class="tabs">
		<?foreach ($arResult['SECTIONS'] as $arSection):?>
			<?if (!empty($arSection['ELEMENTS'])):?>
				<li class="tab">
					<a href="#section<?=$arSection['ID']?>"><?=$arSection['NAME']?></a>
				</li>
			<?endif;?>
		<?endforeach;?>
		<div class="clear"></div>
		<div class="bottom-line"></div>
	</ul>
	<div class="clear"></div>
	<?foreach ($arResult['SECTIONS'] as $arSection):?>
		<?if (!empty($arSection['ELEMENTS'])):?>
			<div class="section uni_parent_col" style="margin-left: -30px; margin-right: -30px;" id="section<?=$arSection['ID']?>">
				<?
					$addreses = array();
					$coords = array();
				?>
				<?foreach ($arSection['ELEMENTS'] as $arElement):?>
					<?
						if (!empty($arElement['PROPERTIES']['MAP']['VALUE']))
						{
							$addreses[] = $arElement['PROPERTIES']['ADDRESSLOCALITY']['VALUE'].', '.$arElement['PROPERTIES']['STREETADDRESS']['VALUE'];
							$coords[] = explode(',', $arElement['PROPERTIES']['MAP']['VALUE']);
						}
						
						$picture = SITE_TEMPLATE_PATH.'/images/noimg/noimg_quadro.jpg';
						
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
					<a href="<?=$arElement['DETAIL_PAGE_URL']?>" class="element uni_col uni-33" style="padding-left: 30px; padding-right: 30px;">
						<div class="image">
							<div class="valign"></div>
							<img src="<?=$picture?>" />
						</div>
						<div class="information">
							<div class="address"><?=$arElement['PROPERTIES']['ADDRESSLOCALITY']['VALUE'].', '.$arElement['PROPERTIES']['STREETADDRESS']['VALUE']?></div>
							<div class="phone"><?=GetMessage('CONTACTS_LIST_PHONE')?>: <?=$arElement['PROPERTIES']['PHONES']['VALUE'][0]?></div>
							<div class="email"><?=$arElement['PROPERTIES']['EMAIL']['VALUE']?></div>
						</div>
					</a>
				<?endforeach;?>
				<div class="clear"></div>
				<?if (count($coords) > 0):?>
					<?
						$mapData = array(
							"yandex_lat" => $coords[0][0],
							"yandex_lon" => $coords[0][1],
							"yandex_scale" => $arSection['ALL'] == 'Y'?"4":"10",
							"PLACEMARKS" => Array()
						);
						
						foreach($coords as $key => $coord)
						{
							$mapData['PLACEMARKS'][] = array(
								"TEXT" => $addreses[$key],
								"LON" => $coord[1],
								"LAT" => $coord[0],
							);
						}
						
						$mapData = serialize($mapData);
					?>
					<div class="map">
						<?$APPLICATION->IncludeComponent(
						   "bitrix:map.yandex.view",
						   "",
						   Array(
							  "INIT_MAP_TYPE" => "MAP",
							  "MAP_DATA" => $mapData,
							  "MAP_WIDTH" => "670",
							  "MAP_HEIGHT" => "500",
							  "CONTROLS" => Array("TOOLBAR", "ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
							  "OPTIONS" => Array(/*"ENABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", */"ENABLE_DRAGGING"),
							  "MAP_ID" => ""
						   )
						);?>
					</div>
					<div class="clear"></div>
				<?endif;?>
			</div>
		<?endif;?>
	<?endforeach;?>
</div>
<script type="text/javascript">
	$("#tabs").tabs();
</script>
