<?$this->setFrameMode(true)?>
<?if($arResult){?>
	<ul class="top_custom_menu clearfix">
		<?foreach($arResult as $arItem){?>
			<li class="<?=$arItem["SELECTED"]?"active":""?>">
				<a class="title_f" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?}?>
	</ul>
<?}?>