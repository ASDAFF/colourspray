<div class="bx_section">
	<div class="bx_ordercart_order_pay">
		<div class="bx_ordercart_order_pay_right">
			<table class="bx_ordercart_order_sum">
				<tbody>
					<?/*
					if (floatval($arResult['ORDER_WEIGHT']) > 0):
					?>
					<tr>
						<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_WEIGHT_SUM")?></td>
						<td class="custom_t2 price"><?=$arResult["ORDER_WEIGHT_FORMATED"]?></td>
					</tr>
					<?
					endif;
					?>
					<tr>
						<td class="custom_t1 itog <?=($bUseDiscount?'with_discount' :'')?>" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?></td>
						<?
						if ($bUseDiscount)
						{
							?>
								<td class="custom_t2 price">
									<?=$arResult["ORDER_PRICE_FORMATED"]?><br/><span style="text-decoration:line-through; color:#828282;"><?=$arResult["PRICE_WITHOUT_DISCOUNT"]?></span></td>
							<?
						}
						else
						{
							?>
							<td class="custom_t2 price"><?=$arResult["ORDER_PRICE_FORMATED"]?></td>
							<?
						}
						?>
					</tr>
					<?
					if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?><?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?echo $arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>:</td>
							<td class="custom_t2"><?echo $arResult["DISCOUNT_PRICE_FORMATED"]?></td>
						</tr>
						<?
					}
					if(!empty($arResult["TAX_LIST"]))
					{
						foreach($arResult["TAX_LIST"] as $val)
						{
							?>
							<tr>
								<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=$val["NAME"]?> <?=$val["VALUE_FORMATED"]?>:</td>
								<td class="custom_t2"><?=$val["VALUE_MONEY_FORMATED"]?></td>
							</tr>
							<?
						}
					}
					if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></td>
							<td class="custom_t2"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></td>
						</tr>
					<?
					}

					if (strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
							<td class="custom_t2" class="price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></td>
						</tr>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_PAYED")?></td>
							<td class="custom_t2" class="price"><?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></td>
						</tr>
						<tr>
							<td class="custom_t1 fwb" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_LEFT_TO_PAY")?></td>
							<td class="custom_t2 fwb" class="price"><?=$arResult["ORDER_TOTAL_LEFT_TO_PAY_FORMATED"]?></td>
						</tr>
					<?
					}
					else
					{
						?>
						<tr>
							<td class="custom_t1 fwb" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
							<td class="custom_t2 fwb" class="price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></td>
						</tr>
					<?
					}
					*/?>
					<tr>
						<td class="custom_t1 itog <?=($bUseDiscount?'with_discount' :'')?>" style="font-size: 13px;" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?></td>
						<?
						if ($bUseDiscount)
						{
							?>
								<td class="custom_t2 price" style="font-size: 13px;">
									<?=$arResult["ORDER_PRICE_FORMATED"]?><br/><span style="text-decoration:line-through; color:#828282;"><?=$arResult["PRICE_WITHOUT_DISCOUNT"]?></span></td>
							<?
						}
						else
						{
							?>
							<td class="custom_t2 price" style="font-size: 13px;"><?=$arResult["ORDER_PRICE_FORMATED"]?></td>
							<?
						}
						?>
					</tr>
					<tr>
						<td class="custom_t1" style="font-size: 13px;" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></td>
						<td class="custom_t2" style="font-size: 13px;"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></td>
					</tr>
					<tr>
						<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
						<td class="custom_t2" class="price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></td>
					</tr>
				</tbody>
			</table>
			<div style="clear:both;"></div>

		</div>
		<div style="clear:both;"></div>
	</div>
</div>