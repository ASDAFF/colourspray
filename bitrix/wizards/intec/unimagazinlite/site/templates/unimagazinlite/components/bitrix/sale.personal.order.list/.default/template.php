<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult['ERRORS']['FATAL'])):?>
	<?foreach($arResult['ERRORS']['FATAL'] as $error):?>
		<?=ShowError($error)?>
	<?endforeach?>
	<?$component = $this->__component;?>
	<?if($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED])):?>
		<?$APPLICATION->AuthForm('', false, false, 'N', false);?>
	<?endif?>
<?else:?>
	<?if(!empty($arResult['ERRORS']['NONFATAL'])):?>
		<?foreach($arResult['ERRORS']['NONFATAL'] as $error):?>
			<?=ShowError($error)?>
		<?endforeach;?>
	<?endif?>
	<div class="bx_my_order_switch">
		<?$nothing = !isset($_REQUEST["filter_history"]) && !isset($_REQUEST["show_all"]);?>	
		<a class="bx_mo_link <?=($nothing || $_REQUEST["show_all"] == "Y") ? "active" : "";?>" href="<?=$arResult["CURRENT_PAGE"]?>?show_all=Y"><?=GetMessage('SPOL_ORDERS_ALL')?></a>
		<a class="bx_mo_link <?=($_REQUEST["filter_history"] == "N")? "active" : "";?>" href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=N"><?=GetMessage('SPOL_CUR_ORDERS')?></a>
		<a class="bx_mo_link <?=$_REQUEST["filter_history"] == "Y"? "active" : "";?>" href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=Y"><?=GetMessage('SPOL_ORDERS_HISTORY')?></a>
	</div>
	<?if(!empty($arResult['ORDERS'])):?>
		<table>
			<thead>
				<tr>
					<th>
						<?=GetMessage("P_NUMBER_ORDER");?>
					</th>
					<th>
						<?=GetMessage("P_DATE");?>
					</th>
					<th>
						<?=GetMessage("P_PRODUCT");?>
					</th>
					<th>
						<?=GetMessage("P_COUNT");?>
					</th>
				</tr>
			</thead>
		</table>
		<?foreach($arResult["ORDER_BY_STATUS"] as $key => $group){?>
			<?foreach($group as $k => $order){?>
				<div class="bx_my_order">
					<div class="header_order">
						<div class="body">
							<a class="link_order" href="<?=$order["ORDER"]["URL_TO_DETAIL"]?>">
								<?=GetMessage('SPOL_ORDER')?> <?=GetMessage('SPOL_NUM_SIGN')?><?=$order["ORDER"]["ACCOUNT_NUMBER"]?>						
							</a>&nbsp;
							<span class="date_order">
								<?if(strlen($order["ORDER"]["DATE_INSERT_FORMATED"])):?>
									<?=GetMessage('SPOL_FROM')?> <?=$order["ORDER"]["DATE_INSERT_FORMATED"];?>
								<?endif?>
							<span>
						</div>
						<?/*<div class="switch_order solid_element"></div>*/?>
					</div>
					<div class="body_order">
						<table>
							<tr>
								<td>
									<span><?=GetMessage('SPOL_PAY_SUM')?></span>
								</td>
								<td>
									<span><?=GetMessage('SPOL_PAYED')?>: </span> <?=GetMessage('SPOL_'.($order["ORDER"]["PAYED"] == "Y" ? 'YES' : 'NO'))?> 
								</td>
								<td style="text-align:right;">
									<div class="bx_my_order_status <?=$arResult["INFO"]["STATUS"][$key]['COLOR']?><?/*yellow*/ /*red*/ /*green*/ /*gray*/?>"><?=$arResult["INFO"]["STATUS"][$key]["NAME"]?></div>
								</td>
							</tr>
							<tr>
								<td>
									<strong style='font-size:18px;'><?=$order["ORDER"]["FORMATED_PRICE"]?></strong>
								</td>
								<td>
									<?// PAY SYSTEM ?>
									<?$paySystemList = array();?>
									<?foreach($order["PAYMENT"] as $payment):?>
										<?$paySystemList[] = $arResult['INFO']['PAY_SYSTEM'][$payment['PAY_SYSTEM_ID']]['NAME'];?>
									<?endforeach;?>
									<?if(!empty($paySystemList)):?>
										<span><?=GetMessage('SPOL_PAYSYSTEM')?>:</span> <?=implode(', ', $paySystemList)?> 
									<?endif?>
								</td>
								<td style="text-align:right;">
									<div class="clearfix">
										<a href="<?=$order["ORDER"]["URL_TO_COPY"]?>" style="" class="solid_button button replay_order"><?=GetMessage('SPOL_REPEAT_ORDER')?></a>
										<?if($order["ORDER"]["CANCELED"] != "Y"):?>											
											<a href="<?=$order["ORDER"]["URL_TO_CANCEL"]?>" style=""class="button cancel_order"><?=GetMessage('SPOL_CANCEL_ORDER')?></a>
										<?endif?>									
									</div>
								</td>
							</tr>
						</table>
						<?/* // DELIVERY SYSTEM ?>
						<? $deliveryServiceList = array(); ?>
						<?foreach ($order['SHIPMENT'] as $shipment):?>
							<? $deliveryServiceList[] = $arResult['INFO']['DELIVERY'][$shipment['DELIVERY_ID']]['NAME'];?>
						<?endforeach;?>
						<?if(!empty($deliveryServiceList)):?>
							<strong><?=GetMessage('SPOL_DELIVERY')?>:</strong> <?=implode(', ', $deliveryServiceList)?> <br />
						<?endif*/?>						
					</div>
					<? // PRODUCTS?>
					<table class="items">
						<thead>
							<tr>
								<th><?=GetMessage("SPOL_NUM_SIGN")?></th>
								<th><?=GetMessage("SPOL_TITLE_PRODUCT")?></th>	
								<th><?=GetMessage("SPOL_TITLE_COUNT")?></th>									
								<th><?=GetMessage("SPOL_TITLE_PRICE")?></th>									
							</tr> 
						</thead>
						<?$i = 0;?>
						<?foreach ($order["BASKET_ITEMS"] as $item):?>
							<?$i++;?>
							<tr>
								<td>
									<?=$i;?>
								</td>
								<td>
									<a href="<?=$item["DETAIL_PAGE_URL"]?>" target="_blank">
										<?=$item['NAME']?>
									</a> 
								</td>
								<td>
									<?=$item['QUANTITY']?> <?=(isset($item["MEASURE_NAME"]) ? $item["MEASURE_NAME"] : GetMessage('SPOL_SHT'))?>
								</td>
								<td>
									<?=FormatCurrency($item["PRICE"], $item["CURRENCY"]);?>
								</td>
							</tr>
						<?endforeach?>
					</table>
							
				</div>
			<?}?>
		<?}?>
		<script>
			//$(document).ready(function(){
			//	$('.switch_order').click(function(){
			//		$(this).toggleClass("active");
			//		$(this).parent().parent().find(".body_order").slideToggle();
			//	})
			//})
		</script>
		
		<?if(strlen($arResult['NAV_STRING'])):?>
			<?=$arResult['NAV_STRING']?>
		<?endif?>

	<?else:?>
		<?=GetMessage('SPOL_NO_ORDERS')?>
	<?endif?>

<?endif?>