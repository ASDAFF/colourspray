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
$itemCount = count($arResult);?>
<!--noindex-->
<a class="compare-small<?=!empty($arParams['TYPE'])?' '.$arParams['TYPE']:''?>" href="<? echo $arParams["COMPARE_URL"]; ?>" title="<?=GetMessage("TITLE_COMPARE_TOP")?>">
	<?if ($itemCount > 0):?>
		<div class="text-wrapper solid_element">
			<div class="uni-aligner-vertical"></div>
			<div class="text">
				<?$frame = $this->createFrame()->begin()?>
					<?=$itemCount?>
				<?$frame->beginStub()?>
					0
				<?$frame->end()?>
			</div>
		</div>
	<?endif;?>
	<div class="icon"></div>
</a>
<!--/noindex-->