<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
	ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0):
?>
<div id="basket_items_list">
	<div class="bx_ordercart_order_table_container">
		<table id="basket_items">
			<thead>
				<tr>
					<?
					foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):
						$arHeader["name"] = (isset($arHeader["name"]) ? (string)$arHeader["name"] : '');
						if ($arHeader["name"] == '')
							$arHeader["name"] = GetMessage("SALE_".$arHeader["id"]);
						$arHeaders[] = $arHeader["id"];

						// remember which values should be shown not in the separate columns, but inside other columns
						if (in_array($arHeader["id"], array("TYPE")))
						{
							$bPriceType = true;
							continue;
						}
						elseif ($arHeader["id"] == "PROPS")
						{
							$bPropsColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELAY")
						{
							$bDelayColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELETE")
						{
							$bDeleteColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "WEIGHT")
						{
							$bWeightColumn = true;
						}

						if ($arHeader["id"] == "NAME"):
						?>
							<td class="item" colspan="2" id="col_<?=$arHeader["id"];?>">
						<?
						elseif ($arHeader["id"] == "PRICE"):
						?>
							<td class="price" id="col_<?=$arHeader["id"];?>">
						<?
						else:
						?>
							<td class="custom" id="col_<?=$arHeader["id"];?>">
						<?
						endif;
						?>
							<?=$arHeader["name"]; ?>
							</td>
					<?
					endforeach;

					if ($bDeleteColumn || $bDelayColumn):
					?>
						<td class="custom"></td>
					<?
					endif;
					?>
				</tr>
			</thead>

			<tbody>
				<?
				foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
					
					if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
				?>
					<tr id="<?=$arItem["ID"]?>">
						<?
						foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):

							if (in_array($arHeader["id"], array("PROPS", "DELAY", "DELETE", "TYPE"))) // some values are not shown in the columns in this template
								continue;

							if ($arHeader["id"] == "NAME"):
							?>
								<td class="itemphoto">
									<div class="bx_ordercart_photo_container">
										<?
										if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
											$url = $arItem["PREVIEW_PICTURE_SRC"];
										elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
											$url = $arItem["DETAIL_PICTURE_SRC"];
										else:
											$url = $templateFolder."/images/no_photo.png";
										endif;
										?>

										<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
											<div class="bx_ordercart_photo" style="background-image:url('<?=$url?>')"></div>
										<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
									</div>
									<?
									if (!empty($arItem["BRAND"])):
									?>
									<div class="bx_ordercart_brand">
										<img alt="" src="<?=$arItem["BRAND"]?>" />
									</div>
									<?
									endif;
									?>
								</td>
								<td class="item">
									<h2 class="bx_ordercart_itemtitle">
										<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
											<?=$arItem["NAME"]?>
										<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
									</h2>
									<div class="bx_ordercart_itemart">
										<?
											if ($bPropsColumn):
												foreach ($arItem["PROPS"] as $val):

													if (is_array($arItem["SKU_DATA"]))
													{
														$bSkip = false;
														foreach ($arItem["SKU_DATA"] as $propId => $arProp)
														{
															if ($arProp["CODE"] == $val["CODE"])
															{
																$bSkip = true;
																break;
															}
														}
														if ($bSkip)
															continue;
													}
												endforeach;
											endif;
										?>
									</div>
									<?
									if (is_array($arItem["SKU_DATA"]) && !empty($arItem["SKU_DATA"])):
										foreach ($arItem["SKU_DATA"] as $propId => $arProp):

											// if property contains images or values
											$isImgProperty = false;
											if (!empty($arProp["VALUES"]) && is_array($arProp["VALUES"]))
											{
												foreach ($arProp["VALUES"] as $id => $arVal)
												{
													if (!empty($arVal["PICT"]) && is_array($arVal["PICT"])
														&& !empty($arVal["PICT"]['SRC']))
													{
														$isImgProperty = true;
														break;
													}
												}
											}
											
											if ($isImgProperty):?>
												<?foreach ($arProp["VALUES"] as $valueId => $arSkuValue):?>
													<?$selected = false;?>
													<?foreach ($arItem["PROPS"] as $arItemProp):?>
														<?if ($arItemProp["CODE"] == $arItem["SKU_DATA"][$propId]["CODE"])
														{
															if ($arItemProp["VALUE"] == $arSkuValue["NAME"] || $arItemProp["VALUE"] == $arSkuValue["XML_ID"])
																$selected = true;
														}?>
													<?endforeach;?>
													<?if ($selected):?>
														<div class="property">
															<span class="title">
																<?=$arProp["NAME"]?>:
															</span>
															<img src="<?=$arSkuValue["PICT"]["SRC"]?>" />
														</div>
													<?endif;?>
												<?endforeach;?>
											<?else:?>
												<?foreach ($arProp["VALUES"] as $valueId => $arSkuValue):?>
													<?$selected = false;?>
													<?foreach ($arItem["PROPS"] as $arItemProp):?>
														<?if ($arItemProp["CODE"] == $arItem["SKU_DATA"][$propId]["CODE"])
														{
															if ($arItemProp["VALUE"] == $arSkuValue["NAME"])
																$selected = true;
														}?>
													<?endforeach;?>
													<?if ($selected):?>
														<div class="property">
															<span class="title">
																<?=$arProp["NAME"]?>:
															</span>
															<span class="text">
																<?=$arSkuValue["NAME"]?>
															</span>
														</div>
													<?endif;?>
												<?endforeach;?>
											<?endif;?>
										<?endforeach;?>
									<?endif;?>
								</td>
							<?
							elseif ($arHeader["id"] == "QUANTITY"):
							?>
								<td class="custom">
									<?if (!empty($arHeader["name"])):?>
										<span><?=$arHeader["name"]; ?>:</span>
									<?endif;?>
									<div class="centered">
										<table cellspacing="0" cellpadding="0" class="counter">
											<tr>
												<?
													
													$ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
													$max = isset($arItem["AVAILABLE_QUANTITY"]) ? "max=\"".$arItem["AVAILABLE_QUANTITY"]."\"" : "";
													$useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
													$useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
													
													if (!isset($arItem["MEASURE_RATIO"]))
													{
														$arItem["MEASURE_RATIO"] = 1;
													}
												?>
												<td id="basket_quantity_control">
													<div class="basket_quantity_control">
														<a href="javascript:void(0);" class="minus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'down', <?=$useFloatQuantityJS?>);">-</a>
													</div>
												</td>
												<td id="basket_quantity">
													<input
														type="text"
														size="3"
														id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														size="2"
														maxlength="18"
														min="0"
														<?=$max?>
														step="<?=$ratio?>"
														value="<?=$arItem["QUANTITY"]?>"
														onchange="updateQuantity('QUANTITY_INPUT_<?=$arItem["ID"]?>', '<?=$arItem["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>)"
													>
												</td>
												<td id="basket_quantity_control">
													<div class="basket_quantity_control">
														<a href="javascript:void(0);" class="plus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'up', <?=$useFloatQuantityJS?>);">+</a>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />
								</td>
							<?
							elseif ($arHeader["id"] == "PRICE"):
							?>
								<td class="price">
									<div class="current_price" id="current_price_<?=$arItem["ID"]?>">
										<?=$arItem["PRICE_FORMATED"]?>
									</div>
									<div class="old_price" id="old_price_<?=$arItem["ID"]?>">
										<?if (floatval($arItem["DISCOUNT_PRICE_PERCENT"]) > 0):?>
											<?=$arItem["FULL_PRICE_FORMATED"]?>
										<?endif;?>
									</div>
								</td>
							<?
							elseif ($arHeader["id"] == "DISCOUNT"):
							?>
								<td class="custom">
									<?if (!empty($arHeader["name"])):?>
										<span><?=$arHeader["name"]; ?>:</span>
									<?endif;?>
									<div id="discount_value_<?=$arItem["ID"]?>"><?=$arItem["DISCOUNT_PRICE_PERCENT_FORMATED"]?></div>
								</td>
							<?
							elseif ($arHeader["id"] == "WEIGHT"):
							?>
								<td class="custom">
									<?if (!empty($arHeader["name"])):?>
										<span><?=$arHeader["name"]; ?>:</span>
									<?endif;?>
									<?=$arItem["WEIGHT_FORMATED"]?>
								</td>
							<?
							else:
							?>
								<td class="custom">
									<?if (!empty($arHeader["name"])):?>
										<span><?=$arHeader["name"]; ?>:</span>
									<?endif;?>
									<?
									if ($arHeader["id"] == "SUM"):
									?>
										<div id="sum_<?=$arItem["ID"]?>">
									<?
									endif;

									echo $arItem[$arHeader["id"]];

									if ($arHeader["id"] == "SUM"):
									?>
										</div>
									<?
									endif;
									?>
								</td>
							<?
							endif;
						endforeach;

						if ($bDelayColumn || $bDeleteColumn):?>
							<td class="control">
								<div class="min-buttons">
									<?if ($bDelayColumn):?>
										<a class="min-button like" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delay"])?>">
											<div class="add" title="<?=GetMessage('LIKE_TEXT_DETAIL')?>"></div>
										</a>
									<?endif;?>
									<?if ($bDeleteColumn):?>
										<a class="min-button delete" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>">
											<div class="add" title="<?=GetMessage('DELETE_TEXT_DETAIL')?>"></div>
										</a>
									<?endif;?>
								</div>
							</td>
						<?endif;?>
					</tr>
					<?
					endif;
				endforeach;
				?>
			</tbody>
		</table>
	</div>
	<input type="hidden" id="column_headers" value="<?=CUtil::JSEscape(implode($arHeaders, ","))?>" />
	<input type="hidden" id="offers_props" value="<?=CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ","))?>" />
	<input type="hidden" id="action_var" value="<?=CUtil::JSEscape($arParams["ACTION_VARIABLE"])?>" />
	<input type="hidden" id="quantity_float" value="<?=$arParams["QUANTITY_FLOAT"]?>" />
	<input type="hidden" id="count_discount_4_all_quantity" value="<?=($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="price_vat_show_value" value="<?=($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="hide_coupon" value="<?=($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="use_prepayment" value="<?=($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N"?>" />

	<div class="bx_ordercart_order_pay">

		<div class="bx_ordercart_order_pay_left" id="coupons_block">
			<div class="bx_ordercart_coupon">
				<span><?=GetMessage("STB_COUPON_PROMT")?></span><input type="text" class="uni-input-text" id="coupon" name="COUPON" value="" onchange="enterCoupon();">
			</div><?
				if (!empty($arResult['COUPON_LIST']))
				{
					foreach ($arResult['COUPON_LIST'] as $oneCoupon)
					{
						$couponClass = 'disabled';
						switch ($oneCoupon['STATUS'])
						{
							case DiscountCouponsManager::STATUS_NOT_FOUND:
							case DiscountCouponsManager::STATUS_FREEZE:
								$couponClass = 'bad';
								break;
							case DiscountCouponsManager::STATUS_APPLYED:
								$couponClass = 'good';
								break;
						}
						?><div class="bx_ordercart_coupon"><input disabled readonly type="text" name="OLD_COUPON[]" value="<?=htmlspecialcharsbx($oneCoupon['COUPON']);?>" class="<? echo $couponClass; ?>"><span class="<? echo $couponClass; ?>" data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"></span><div class="bx_ordercart_coupon_notes"><?
						if (isset($oneCoupon['CHECK_CODE_TEXT']))
						{
							echo (is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
						}
						?></div></div><?
					}
					unset($couponClass, $oneCoupon);
				}
?>
		</div>
		<div class="bx_ordercart_order_sum">
			<div class="sum">
				<span><?=GetMessage("SALE_TOTAL")?></span>
				<span id="allSum_FORMATED"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></span>
			</div>
			<div class="bx_ordercart_order_pay_center">
				<a href="javascript:void(0)" onclick="checkOut();" class="uni-button solid_button"><?=GetMessage("SALE_ORDER")?></a>
			</div>
		</div>
		<div class="clear"></div>		
	</div>
</div>
<?
else:
?>
<div id="basket_items_list">
	<table>
		<tbody>
			<tr>
				<td colspan="<?=$numCells?>" style="text-align:center">
					<div class=""><?=GetMessage("SALE_NO_ITEMS");?></div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
endif;
?>