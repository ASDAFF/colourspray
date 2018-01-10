<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?$frame = $this->createFrame()->begin()?>
	<?if (!empty($arResult)):?>
		<div class="view-list-left clearfix standart_block">
			<h3 class="header_grey"><?=GetMessage("VIEW_HEADER");?></h3>
			<?foreach($arResult as $arItem):?>
				<div class="view-item clearfix hover_shadow">
					<?if($arParams["VIEWED_IMAGE"]=="Y"):?>
						<?$src = $arItem["PICTURE"]["src"] ? $arItem["PICTURE"]["src"] : SITE_TEMPLATE_PATH."/images/noimg/noimg_quadro.jpg"?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="left_block" style="background-image:url('<?=$src?>')">						
						</a>
					<?endif?>
					<div class="right_block">
						<?if($arParams["VIEWED_NAME"]=="Y"):?>
							<a class="name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=TruncateText($arItem["NAME"],30);?></a>
						<?endif?>
						<?if($arParams["VIEWED_PRICE"]=="Y" && $arItem["CAN_BUY"]=="Y"):?>
							<div class="price"><?=$arItem["PRICE_FORMATED"]?></div>
						<?endif?>
					</div>
				</div>
			<?endforeach;?>
		</div>
	<?endif;?>
<?$frame->end();?>