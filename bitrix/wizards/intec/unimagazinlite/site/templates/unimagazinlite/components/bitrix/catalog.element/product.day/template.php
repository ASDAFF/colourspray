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
$this->setFrameMode(true);?>
<?
if (!empty($arResult["PREVIEW_PICTURE"]["SRC"])) {
    $arPicture = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"],array('width'=>209, 'height'=>172),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
	$sPicture = $arPicture['src'];
} else if(!empty($arResult["DETAIL_PICTURE"]["SRC"])) {
	$arPicture = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"],array('width'=>209, 'height'=>172),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
	$sPicture = $arPicture['src'];
} else {
	$sPicture = SITE_TEMPLATE_PATH."/images/noimg/noimg_quadro.jpg";
}?>
<?$frame = $this->createFrame()->begin()?>
<div class="product-day standart_block hover_shadow">
	<div class="product-day-header solid_element">
		<?=$arParams["TEXT_PRODUCT_DAY"]?>
	</div>
	<a href="<?=$arResult["DETAIL_PAGE_URL"]?>" class="uni-image image">		
        <div class="uni-aligner-vertical"></div>
        <img src="<?=$sPicture?>" />
	</a>
	<div class="name"><a href="<?=$arResult["DETAIL_PAGE_URL"]?>"><?=$arResult['NAME']?></a></div>
	<div class="price">
		<div class="current"><?=$arResult['MIN_PRICE']['PRINT_VALUE']?></div>
	</div>
	<?$data=date("j F Y",strtotime($arResult["PROPERTIES"]["CML2_DAY_PROD"]["VALUE"]));?>
	<?if($arParams["DATE_PRODUCT_DAY"]=="Y") { ?>
		<div class="time"> 
			<input type="hidden"  id="data_product" value="<?=$data?>"/>
			<div class="countdown">
				<table id="countdown">
				<tr>
					<td id="pd_num_day" class="pd_td"></td>
					<td class="pd_num_separator" style="padding-left:15px;"></td>
					<td id="pd_num_hour" class="pd_td"></td>
					<td class="pd_num_separator">:</td>
					<td id="pd_num_min" class="pd_td"></td>
					<td class="pd_num_separator">:</td>
					<td id="pd_num_sec" class="pd_td"></td>
				</tr>	
				<tr>
					<td class="pdtd"><?=GetMessage("DAY")?></td>
					<td ></td>
					<td class="pdtd"><?=GetMessage("CLOCK")?></td>
					<td ></td>
					<td class="pdtd"><?=GetMessage("MINUTS")?></td>
					<td ></td>
					<td class="pdtd"><?=GetMessage("SECUND")?></td>
				</tr>			
				</table>
				<div id="action_end" style="display:none;">
					<?=GetMessage('ACTION_END')?>
				</div>				
			</div>
		</div>
		<script type="text/javascript">
			function start_conuntdown(){
				var data = document.getElementById("data_product").value;
				var today = new Date().getTime();
				var end = new Date(data).getTime();
				var dateX = new Date(end-today);
				var perDays = 60*60*1000*24;
				if(dateX>0){ 
					document.getElementById("pd_num_day").innerHTML = Math.round(dateX/perDays);
					document.getElementById("pd_num_hour").innerHTML = dateX.getUTCHours().toString();
					document.getElementById("pd_num_min").innerHTML = dateX.getMinutes().toString();
					document.getElementById("pd_num_sec").innerHTML = dateX.getSeconds().toString() ;
				}
				else {
					$('#countdown').hide();
					$('#action_end').show();				
				}
			}
			setInterval(start_conuntdown, 1000);
		</script>
	<?}?>
</div>
<?$frame->end()?>
