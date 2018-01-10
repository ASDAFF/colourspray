<?
	$rsSpecialists = CIBlockElement::GetList(array(), array('ID' => $arResult['PROPERTIES']['SPECIALIST']['VALUE']), false, false);
	$rsSpecialist = $rsSpecialists->GetNextElement();
	$arSpecialist = $rsSpecialist->GetFields();
	$arSpecialist['PROPERTIES'] = $rsSpecialist->GetProperties();
	
	$picture = array();
	$picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
	
	if (!empty($arSpecialist['PREVIEW_PICTURE']))
	{
		$picture = CFile::ResizeImageGet($arSpecialist['PREVIEW_PICTURE'], array('width' => 52, "height" => 52), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
	}
	else if (!empty($arSpecialist['DETAIL_PICTURE']))
	{
		$picture = CFile::ResizeImageGet($arSpecialist['DETAIL_PICTURE'], array('width' => 52, "height" => 52), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
	}
?>
<div class="specialist">
	<?if (is_array($picture)) {?>
		<div class="uni-image image">
			<div class="uni-aligner-vertical"></div>
			<img src="<?=$picture['src']?>">
		</div>
	<?}?>
	<div class="information">
		<div class="initials">
			<?=$arSpecialist['NAME']?>
		</div>
		<div class="contacts">
			<?if (!empty($arSpecialist['PROPERTIES']['POST']['VALUE'])) {?>
				<div class="contact">
					<?=$arSpecialist['PROPERTIES']['POST']['VALUE']?>
				</div>
			<?}?>
			<?if (!empty($arSpecialist['PROPERTIES']['PHONE']['VALUE'])) {?>
				<div class="contact">
					<?=GetMessage('SERVICE_SPECIALIST_PHONE')?> <?=$arSpecialist['PROPERTIES']['PHONE']['VALUE']?>
				</div>
			<?}?>
			<?if (!empty($arSpecialist['PROPERTIES']['EMAIL']['VALUE'])) {?>
				<div class="contact">
					<?=GetMessage('SERVICE_SPECIALIST_EMAIL')?> <?=$arSpecialist['PROPERTIES']['EMAIL']['VALUE']?>
				</div>
			<?}?>
		</div>
	</div>
</div>