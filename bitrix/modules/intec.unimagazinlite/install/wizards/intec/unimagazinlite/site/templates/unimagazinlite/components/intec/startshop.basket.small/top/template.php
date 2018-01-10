<?$this->setFrameMode(true);?>
<a class="startshop-basket-small startshop-link startshop-link-hover-dark<?=$arParams['DISPLAY_COUNT'] == "Y" ? ' startshop-with-count' : ''?>" href="<?=$arResult['CART_URI']?>">
	<?$frame = $this->createFrame()->begin()?>
		<?if ($arResult['TOTAL']['COUNT'] > 0 || $arParams['DISPLAY_COUNT_IF_NULL'] == "Y"):?>
			<?if ($arParams['DISPLAY_COUNT'] == "Y"):?>
				<div class="startshop-count startshop-element-background">
					<div class="startshop-aligner-vertical"></div>
					<div class="startshop-text">
						<?=$arResult['TOTAL']['COUNT']?>
					</div>
				</div>
			<?endif;?>
		<?endif;?>
		<div class="startshop-icon"></div>
		<?if ($arParams['DISPLAY_TOTAL'] == "Y"):?>
			<div class="startshop-text-total">
				<?=$arResult['TOTAL']['SUM']['PRINT_VALUE']?>
			</div>
		<?endif;?>
	<?$frame->beginStub()?>
		<?if ($arParams['DISPLAY_COUNT_IF_EMPTY'] == "Y"):?>
			<div class="startshop-count startshop-element-background">
				<div class="startshop-aligner-vertical"></div>
				<div class="startshop-text">
					0
				</div>
			</div>
		<?endif;?>
		<div class="startshop-icon"></div>
		<div class="startshop-text-total">
			0
		</div>
	<?$frame->end()?>	
</a>