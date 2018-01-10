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
<div class="contact">
	<div class="section section-left">
		<div itemscope itemtype="http://schema.org/Organization">
		<?if (!empty($arResult['PROPERTIES']['ADDRESSLOCALITY']['VALUE']) || !empty($arResult['DISPLAY_PROPERTIES']['STREETADDRESS']['VALUE'])):?>
			<div class="field" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<div class="title"><?=GetMessage('CONTACT_ADDRESS')?>:</div>
				<div class="text">
					<span itemprop="postalCode"><?=$arResult['PROPERTIES']['POSTALCODE']['VALUE']?></span>
					<span itemprop="addressLocality"><?=$arResult['PROPERTIES']['ADDRESSLOCALITY']['VALUE']?></span>
					<span itemprop="streetAddress"><?=$arResult['PROPERTIES']['STREETADDRESS']['VALUE']?></span>
				</div>
			</div>
		<?endif;?>
		<?if (!empty($arResult['DISPLAY_PROPERTIES']['PHONES']['VALUE'])):?>
			<div class="field">
				<div class="title"><?=GetMessage('CONTACT_PHONE')?>:</div>
				<?foreach ($arResult['DISPLAY_PROPERTIES']['PHONES']['VALUE'] as $arPhone):?>
					<a href="tel:<?=$arPhone?>" class="text" itemprop="telephone"><?=$arPhone?></a>
				<?endforeach;?>
			</div>
		<?endif;?>
		<?if (!empty($arResult['DISPLAY_PROPERTIES']['WORK']['~VALUE'])):?>
			<div class="field">
				<div class="title"><?=GetMessage('CONTACT_WORK')?>:</div>
				<div class="text"><?=$arResult['DISPLAY_PROPERTIES']['WORK']['~VALUE']?></div>
			</div>
		<?endif;?>
		<?if (!empty($arResult['DISPLAY_PROPERTIES']['EMAIL']['VALUE'])):?>
			<div class="field">
				<div class="title"><?=GetMessage('CONTACT_EMAIL')?>:</div>
				<a href="mailto:<?=$arResult['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?>" class="text" itemprop="email"><?=$arResult['DISPLAY_PROPERTIES']['EMAIL']['VALUE']?></a>
			</div>
		<?endif;?>
		</div>
	</div>
	<div class="section section-right ">
		<?if (!empty($arResult['PREVIEW_TEXT'])):?>
			<div class="description">
				<?=$arResult['PREVIEW_TEXT']?>
			</div>
		<div class="clear"></div>
		<div class="uni-indents-vertical indent-20"></div>
		<?endif;?>
		
		<?if (!empty($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'])):?>
			<div class="images uni_parent_col">
				<?foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $pictureId):?>
					<?
						$pictureFile = CFile::ResizeImageGet($pictureId, array('width' => 500, 'height' => 500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
						
					if ($pictureFile):?>
					<a rel="images_<?=$arResult['ID']?>" class="image uni_col uni-25 fancy" href="<?=$pictureFile['src']?>">
						<img src="<?=$pictureFile['src']?>" />
					</a>
					<?endif;?>
				<?endforeach;?>
			</div>
			<div class="clear"></div>
		<?endif;?>
		<?$APPLICATION->IncludeComponent(
			"intec:startshop.forms.result.new", 
			"contact", 
			array(
				"AJAX_MODE" => "Y",
				"SEF_MODE" => "N",
				"FORM_ID" => $arParams['CONTACT_FORM_ID'],
				"RESULT_ID" => $_REQUEST["RESULT_ID"],
				"START_PAGE" => "new",
				"SHOW_LIST_PAGE" => "N",
				"SHOW_EDIT_PAGE" => "N",
				"SHOW_VIEW_PAGE" => "N",
				"SUCCESS_URL" => "",
				"SHOW_ANSWER_VALUE" => "N",
				"SHOW_ADDITIONAL" => "N",
				"SHOW_STATUS" => "Y",
				"EDIT_ADDITIONAL" => "N",
				"EDIT_STATUS" => "N",
				"NOT_SHOW_FILTER" => "",
				"NOT_SHOW_TABLE" => "",
				"CHAIN_ITEM_TEXT" => "",
				"CHAIN_ITEM_LINK" => "",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"USE_EXTENDED_ERRORS" => "Y",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"AJAX_OPTION_SHADOW" => "N",
				"AJAX_OPTION_JUMP" => "Y",
				"AJAX_OPTION_STYLE" => "Y",
				"COMPONENT_TEMPLATE" => "contact",
				"VARIABLE_ALIASES" => array(
					"WEB_FORM_ID" => "WEB_FORM_ID",
					"RESULT_ID" => "RESULT_ID",
				)
			),
			$component
		); ?>
	</div>
	
	<div class="clear"></div>
	<div  id="map_div" class="section" >
		<?if (!empty($arResult['DISPLAY_PROPERTIES']['MAP']['VALUE'])):?>
			<div id="hg" class="map">
				<?=$arResult['DISPLAY_PROPERTIES']['MAP']['DISPLAY_VALUE']?>
			</div>
			<div class="clear"></div>
		<?endif;?>
	</div>
	
	<div id="balance_div" >
	</div>
	<script>
		var height=$("#map_div").height();
		$("#balance_div").height(height);
		$("#ba").resize(function(){
			var height=$("#map_div").height();
			$("#balance_div").height(height);
		});
	</script>
</div>

	
