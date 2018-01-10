<div class="uni-tabs" id="tabs">
	<ul class="tabs">
		<?if ($switch['DESCRIPTION']):?>
			<li class="tab"><a href="#description"><?=GetMessage('SERVICE_DESCRIPTION')?></a></li>
		<?endif;?>
		<?if ($switch['REVIEWS']):?>
			<li class="tab"><a href="#reviews"><?=GetMessage('SERVICE_REVIEWS')?></a></li>
		<?endif;?>
		<div class="bottom-line"></div>
	</ul>
	<?if ($switch['DESCRIPTION']):?>
		<div id="description" class="uni-text-default"><?=$arResult['DETAIL_TEXT']?></div>
	<?endif;?>
	<?if ($switch['REVIEWS']):?>
		<div id="reviews"><?include ('Reviews.php')?></div>
	<?endif;?>
</div>
<script type="text/javascript">
	$("#tabs").tabs();
</script>