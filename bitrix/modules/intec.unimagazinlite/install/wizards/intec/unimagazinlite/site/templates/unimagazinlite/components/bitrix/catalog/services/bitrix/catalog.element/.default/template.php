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
global $options;

$picture = array();
$picture['noimg'] = true;
$picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
if (!empty($arResult['DETAIL_PICTURE']))
{
	$picture = CFile::ResizeImageGet($arResult['DETAIL_PICTURE']['ID'], array('width' => 320, "height" => 320), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
}
else if (!empty($arResult['PREVIEW_PICTURE']))
{
	$picture = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width' => 320, "height" => 320), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
}

$switch = array();
$switch['DESCRIPTION'] = !empty($arResult['DETAIL_TEXT']);
$switch['SPECIALIST'] = !empty($arResult['PROPERTIES']['SPECIALIST']['VALUE']);
$switch['DOCUMENTS'] = !empty($arResult['PROPERTIES']['DOCUMENTS']['VALUE']);
$switch['SIMILAR_SERVICES'] = $arParams['USE_SIMILAR_SERVICES'] == 'Y';
$switch['REVIEWS'] = $arParams['USE_REVIEW'] == 'Y' && !empty($arParams['REVIEWS_IBLOCK_TYPE']) && !empty($arParams['REVIEWS_IBLOCK_ID']);
$switch['TABS'] = $options['SERVICES_VIEW']['ACTIVE_VALUE'] == 'WITH_TABS';
$switch['PRICE'] = !empty($arResult['PROPERTIES']['PRICE']['VALUE']);

?>
<div class="item">
	<div class="information">
		<?if (!empty($picture)):?>
			<a class="image<?=!$picture['noimg']?' fancy':''?>" href="<?=!$picture['noimg']?$picture['src']:''?>">
				<div class="uni-aligner-vertical"></div>
				<img src="<?=$picture['src']?>" alt="<?=htmlspecialcharsbx($arResult["NAME"])?>" title="<?=htmlspecialcharsbx($arResult["NAME"])?>">
			</a>
		<?endif;?>
		<div class="content<?=empty($picture)?' full':''?>">
			<div class="row">
				<div class="right">
					<?if ($switch['PRICE']):?>
						<div class="price">
							<?=number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 0, '.', ' ')?> <?=GetMessage('SERVICE_CURRENCY')?>
						</div>
						<div class="uni-indents-horizontal indent-25"></div>
					<?endif;?>
					<div class="uni-button solid_button button" onclick="openOrderServicePopup('<?=SITE_DIR?>', '<?=$arResult['NAME']?>');"><?=GetMessage('SERVICE_ORDER_SERVICE')?></div>
				</div>
			</div>
			<div class="uni-indents-vertical indent-40"></div>
			<div class="row uni-text-default">
				<?=$arResult['PREVIEW_TEXT']?>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<?if (!$switch['TABS'] && $switch['DESCRIPTION']):?>
		<div class="uni-indents-vertical indent-50"></div>
		<div class="title"><?=GetMessage('SERVICE_DESCRIPTION')?></div>
		<div class="uni-indents-vertical indent-15"></div>
		<div class="uni-text-default"><?=$arResult['DETAIL_TEXT']?></div>
	<?endif;?>
	<?if ($switch['SPECIALIST']): // Подключение специалиста?>
		<div class="uni-indents-vertical indent-50"></div>
		<div class="title"><?=GetMessage('SERVICE_SPECIALIST')?></div>
		<div class="uni-indents-vertical indent-30"></div>
		<?include ('parts/Specialist.php')?>
	<?endif;?>
	<?if ($switch['DOCUMENTS']): // Подключение документа?>
		<div class="uni-indents-vertical indent-50"></div>
		<div class="title"><?=GetMessage('SERVICE_DOCUMENTS')?></div>
		<div class="uni-indents-vertical indent-30"></div>
		<?include ('parts/Documents.php')?>
	<?endif;?>
	<?if ($switch['TABS'] && ($switch['DESCRIPTION'] || $switch['REVIEWS'])): // Вкладки?>
		<div class="uni-indents-vertical indent-50"></div>
		<?include ('parts/ViewWithTabs.php')?>
	<?endif;?>
	<?if ($switch['SIMILAR_SERVICES']): // Подключение похожих услуг?>
		<?include ('parts/SimilarServices.php')?>
	<?endif;?>
	<?if (!$switch['TABS']):?>
		<?if ($switch['REVIEWS']): // Подключение отзывов?>
			<div class="uni-indents-vertical indent-50"></div>
			<div class="title"><?=GetMessage('SERVICE_REVIEWS')?></div>
			<div class="uni-indents-vertical indent-30"></div>
			<?include ('parts/Reviews.php')?>
		<?endif;?>
	<?endif;?>
</div>
<div class="clear"></div>