<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<a class="link" href="<?=$arResult["URL_TO_LIST"]?>"><?=GetMessage("SPOD_RECORDS_LIST")?></a>
<?if(strlen($arResult["ERROR_MESSAGE"])<=0):?>
	<div class="under_sale_personal_order_detail">
		<div class="title">
			<?=GetMessage("SPOD_ORDER_NO")?>&nbsp;<?=$arResult["ACCOUNT_NUMBER"]?>&nbsp;<?=GetMessage("SPOD_FROM")?> <?=$arResult["DATE_INSERT"] ?>
		</div>
		<table class="sale_personal_order_detail">
			<tr>
				<td><?echo GetMessage("SPOD_ORDER_STATUS")?></td>
				<td ><?=$arResult["STATUS"]["NAME"]?><?=GetMessage("SPOD_ORDER_FROM")?><?=$arResult["DATE_STATUS"]?>)</td>
			</tr>
			<tr>
				<td><?=GetMessage("P_ORDER_PRICE")?>:</td>
				<td ><?
						echo "<b>".$arResult["PRICE_FORMATED"]."</b>";
						if (DoubleVal($arResult["SUM_PAID"]) > 0)
							echo " (".GetMessage("SPOD_ALREADY_PAID")."&nbsp;<b>".$arResult["SUM_PAID_FORMATED"]."</b>)";
						?></td>
			</tr>
			<tr>
				<td align="left" ><?= GetMessage("P_ORDER_CANCELED") ?>:</td>
				<td ><?
					echo (($arResult["CANCELED"] == "Y") ? GetMessage("SALE_YES") : GetMessage("SALE_NO"));
					if ($arResult["CANCELED"] == "Y")
					{
						echo GetMessage("SPOD_ORDER_FROM").$arResult["DATE_CANCELED"].")";
						if (strlen($arResult["REASON_CANCELED"]) > 0)
							echo "<br />".$arResult["REASON_CANCELED"];
					}
					elseif ($arResult["CAN_CANCEL"]=="Y")
					{
						?>&nbsp;&nbsp;&nbsp;<a href="<?=$arResult["URL_TO_CANCEL"]?>"><?=GetMessage("SALE_CANCEL_ORDER")?></a><?
					}
					?></td>
			</tr>
			<tr>
				<td align="left" colspan="2"><img src="/bitrix/images/1.gif" width="1" height="8"></td>
			</tr>
			<?if (IntVal($arResult["USER_ID"])>0):?>
				<tr>
					<th class="notfirst" colspan="2" align="left"><?echo GetMessage("SPOD_ACCOUNT_DATA")?></th>
				</tr>
				<tr>
					<td align="left" ><?= GetMessage("SPOD_ACCOUNT") ?>:</td>
					<td ><?=$arResult["USER_NAME"]?></td>
				</tr>
				<tr>
					<td align="left" ><?= GetMessage("SPOD_LOGIN") ?>:</td>
					<td ><?=$arResult["USER"]["LOGIN"]?></td>
				</tr>
				<tr>
					<td align="left" ><?echo GetMessage("SPOD_EMAIL")?></td>
					<td ><a href="mailto:<?=$arResult["USER"]["EMAIL"]?>"><?=$arResult["USER"]["EMAIL"]?></a></td>
				</tr>
				<tr>
					<td align="left" colspan="2"><img src="/bitrix/images/1.gif" width="1" height="8"></td>
				</tr>
			<?endif;?>
			<tr>
				<th class="notfirst" colspan="2" align="left"><?=GetMessage("P_ORDER_USER")?></th>
			</tr>
			<tr>
				<td align="left" ><?=GetMessage("P_ORDER_PERS_TYPE")?>:</td>
				<td ><?=$arResult["PERSON_TYPE"]["NAME"]?></td>
			</tr>
			<?
			if(!empty($arResult["ORDER_PROPS"]))
			{
				foreach($arResult["ORDER_PROPS"] as $val)
				{
					if ($val["SHOW_GROUP_NAME"] == "Y")
					{
						?>
						<tr>
							<td class="notfirst" colspan="2"><b><?=$val["GROUP_NAME"];?></b></td>
						</tr>
						<?
					}
					?>
					<tr>
						<td  align="left"><?echo $val["NAME"] ?>:</td>
						<td ><?
							if ($val["TYPE"] == "CHECKBOX")
							{
								if ($val["VALUE"] == "Y")
									echo GetMessage("SALE_YES");
								else
									echo GetMessage("SALE_NO");
							}
							else
								echo $val["VALUE"];
							?></td>
					</tr>
					<?
				}
			}
			if (strlen($arResult["USER_DESCRIPTION"])>0)
			{
				?>
				<tr>
					<td align="left" colspan="2">
						<img src="/bitrix/images/1.gif" width="1" height="8">
					</td>
				</tr>
				<tr>
					<td align="left" ><?=GetMessage("P_ORDER_USER_COMMENT")?>:</td>
					<td ><?=$arResult["USER_DESCRIPTION"]?></td>
				</tr>
				<?
			}
			?>
			<tr>
				<td align="left" colspan="2">
					<img src="/bitrix/images/1.gif" width="1" height="8">
				</td>
			</tr>

			<tr>
				<th class="notfirst" colspan="2" align="left"><?=GetMessage("P_ORDER_PAYMENT")?></th>
			</tr>
			<tr>
				<td align="left" ><?=GetMessage("P_ORDER_PAY_SYSTEM")?>:</td>
				<td ><?
					if (IntVal($arResult["PAY_SYSTEM_ID"]) > 0)
						echo $arResult["PAY_SYSTEM"]["NAME"];
					else
						echo GetMessage("SPOD_NONE");
					?></td>
			</tr>
			<tr>
				<td align="left" ><?echo GetMessage("P_ORDER_PAYED") ?>:</td>
				<td >
					<?
					echo (($arResult["PAYED"] == "Y") ? GetMessage("SALE_YES") : GetMessage("SALE_NO"));
					if ($arResult["PAYED"] == "Y")
						echo GetMessage("SPOD_ORDER_FROM").$arResult["DATE_PAYED"].")";
					?>

				</td>
			</tr>
			<?
			if ($arResult["CAN_REPAY"]=="Y")
			{?>
				<tr class="payment_system">
					<td colspan="2" align="left">
						<?
						if ($arResult["PAY_SYSTEM"]["PSA_NEW_WINDOW"] == "Y")
						{
							?>
							<a href="<?=$arResult["PAY_SYSTEM"]["PSA_ACTION_FILE"]?>" target="_blank"><?=GetMessage("SALE_REPEAT_PAY")?></a>
							<?
						}
						else
						{
							$ORDER_ID = $ID;
							include($arResult["PAY_SYSTEM"]["PSA_ACTION_FILE"]);
						}
						?>
					</td>
				</tr>
				<?
			}
			?>
			<tr>
				<td align="left" colspan="2">
					<img src="/bitrix/images/1.gif" width="1" height="8">
				</td>
			</tr>

			<tr>
				<th class="notfirst" colspan="2" align="left"><?= GetMessage("P_ORDER_DELIVERY")?></th>
			</tr>
			<tr>
				<td align="left" ><?=GetMessage("P_ORDER_DELIVERY")?>:</td>
				<td ><?
					if (strpos($arResult["DELIVERY_ID"], ":") !== false || IntVal($arResult["DELIVERY_ID"]) > 0)
					{
						echo $arResult["DELIVERY"]["NAME"];
					}
					else
					{
						echo GetMessage("SPOD_NONE");
					}
					?></td>
			</tr>
			<?if (strlen($arResult["TRACKING_NUMBER"]) > 0){?>
				<tr>
					<td align="left" ><?=GetMessage("P_ORDER_TRACKING_NUMBER")?>:</td>
					<td ><?=$arResult["TRACKING_NUMBER"];?></td>
				</tr>
			<?}?>
			<tr>
				<td align="left" colspan="2">
					<img src="/bitrix/images/1.gif" width="1" height="8">
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding:0">
					<table class="sale_personal_order_detail data-table">
						<tr>
							<th class="name"><div><?=GetMessage("SPOD_NAME");?></div></th>
							<th class="props"><div><?=GetMessage("SPOD_PROPS");?></div></th>
							<th class="discount"><div><?=GetMessage("SPOD_DISCOUNT");?></div></th>					
							<th class="quantity"><div><?=GetMessage("SPOD_QUANTITY");?></div></th>
							<th class="price"><div><?=GetMessage("SPOD_PRICE");?></div></th>
						</tr>
						<?
						foreach($arResult["BASKET"] as $val)
						{
							?>
							<tr>
								<td class="name">
									<a class="name_picture" href ="<?=$val["DETAIL_PAGE_URL"]?>">
										<img src="<?=$val["PICTURE"]["SRC"]?>">
									</a>
									<?
										if (strlen($val["DETAIL_PAGE_URL"])>0)
											echo "<a href=\"".$val["DETAIL_PAGE_URL"]."\">";
										echo htmlspecialcharsEx($val["NAME"]);
										if (strlen($val["DETAIL_PAGE_URL"])>0)
											echo "</a>";
										?>
								</td>
								<td class="props"> <?
									if(!empty($val["PROPS"])):?>
										<table cellspacing="0">
										<?
										foreach($val["PROPS"] as $vv)
										{
												?>
												<tr style="border:0">
													<td style="border:0px; padding:1px;"><?=$vv["NAME"]?>:</td>
													<td style="border:0px; padding:1px;"><?=$vv["VALUE"]?></td>
												</tr>
												<?
										}
										?>
										</table>
									<?endif;?>
								</td>
								<td class="discount"><?=$val["DISCOUNT_PRICE_PERCENT_FORMATED"]?></td>					
								<td class="quantity"><?=$val["QUANTITY"]?></td>
								<td class="price"><?=$val["PRICE_FORMATED"]?></td>
							</tr>
							<?
						}
						?>
						<?if(strlen($arResult["DISCOUNT_VALUE_FORMATED"]) > 0):?>
						<tr>
							<td align="left"><b><?=GetMessage("SPOD_DISCOUNT")?>:</b></td>
							<td align="left" colspan="2"><?=$arResult["DISCOUNT_VALUE_FORMATED"]?></td>
						</tr>
						<?endif;?>
						<?
						foreach($arResult["TAX_LIST"] as $val)
						{
							?>
							<tr>
								<td align="left"><?
									echo $val["TAX_NAME"];
									echo $val["VALUE_FORMATED"];
									?>:</td>
								<td align="left" colspan="4"><?=$val["VALUE_MONEY_FORMATED"]?></td>
							</tr>
							<?
						}
						?>				
						<tr>
							<td colspan="3" style="border:0;padding-left:0;padding-right:0;padding-top:20px;">
								<div class="button clearfix">
									<a class="solid_button" href="<?=$arParams["PATH_TO_LIST"]?>?ID=<?=$arResult["ID"]?>&amp;COPY_ORDER=Y">
										<?=GetMessage("SALE_REPEAT_ORDER");?>
									</a>
									<a class="border_button" href="<?=$arResult["URL_TO_CANCEL"]?>">
										<?=GetMessage("SALE_CANCEL_ORDER");?>
									</a>
								</div>
							</td>
							<td colspan="2" align="right" style="border:0;text-align:left; font-size:18px;font-weight: bold;text-align: right;padding-right: 0" >
								<span style="font-size:13px;font-weight:normal"><?=GetMessage("SPOD_ITOG")?>:</span>&nbsp;&nbsp;&nbsp;<?=$arResult["PRICE_FORMATED"]?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
<?else:?>
	<?=ShowError($arResult["ERROR_MESSAGE"]);?>
<?endif;?>
<a class="link" href="<?=$arResult["URL_TO_LIST"]?>"><?=GetMessage("SPOD_RECORDS_LIST")?></a>
