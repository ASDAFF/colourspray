<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
?>
<div id="basket_items_delayed" class="bx_ordercart_order_table_container" style="display:none">
	<table id="delayed_items">
		<thead>
			<tr>
				<?
				foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):
					$arHeader["name"] = (isset($arHeader["name"]) ? (string)$arHeader["name"] : '');
					if ($arHeader["name"] == '')
						$arHeader["name"] = GetMessage("SALE_".$arHeader["id"]);
					if (in_array($arHeader["id"], array("TYPE"))) // some header columns are shown differently
					{
						continue;
					}
					elseif ($arHeader["id"] == "PROPS")
					{
						$bPropsColumn = true;
						continue;
					}
					elseif ($arHeader["id"] == "DELAY")
					{
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
						<td class="item" colspan="2">
					<?
					elseif ($arHeader["id"] == "PRICE"):
					?>
						<td class="price">
					<?
					else:
					?>
						<td class="custom">
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

				if ($arItem["DELAY"] == "Y" && $arItem["CAN_BUY"] == "Y"):
				$arItem['SUM'] = CurrencyFormat($arItem['PRICE'] * $arItem['QUANTITY'], $arItem['CURRENCY']);
			?>
				<tr id="<?=$arItem["ID"]?>">
					<?
					foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):

						if (in_array($arHeader["id"], array("PROPS", "DELAY", "DELETE", "TYPE"))) // some values are not shown in columns in this template
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
								<input type="hidden" name="DELAY_<?=$arItem["ID"]?>" value="Y"/>
							</td>
						<?
						elseif ($arHeader["id"] == "QUANTITY"):
						?>
							<td class="custom">
								<?if (!empty($arHeader["name"])):?>
									<span><?=$arHeader["name"]; ?>:</span>
								<?endif;?>
								<div>
									<?echo $arItem["QUANTITY"];
										if (isset($arItem["MEASURE_TEXT"]))
											echo "&nbsp;".$arItem["MEASURE_TEXT"];
									?>
								</div>
							</td>
						<?
						elseif ($arHeader["id"] == "PRICE"):
						?>
							<td class="price">
								<?if (doubleval($arItem["DISCOUNT_PRICE_PERCENT"]) > 0):?>
									<div class="current_price"><?=$arItem["PRICE_FORMATED"]?></div>
									<div class="old_price"><?=$arItem["FULL_PRICE_FORMATED"]?></div>
								<?else:?>
									<div class="current_price"><?=$arItem["PRICE_FORMATED"];?></div>
								<?endif?>
							</td>
						<?
						elseif ($arHeader["id"] == "DISCOUNT"):
						?>
							<td class="custom">
								<?if (!empty($arHeader["name"])):?>
									<span><?=$arHeader["name"]; ?>:</span>
								<?endif;?>
								<?=$arItem["DISCOUNT_PRICE_PERCENT_FORMATED"]?>
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
								<?=$arItem[$arHeader["id"]]?>
							</td>
						<?
						endif;
					endforeach;

					if ($bDelayColumn || $bDeleteColumn):?>
						<td class="control">
							<div class="min-buttons">
								<a class="min-button to-cart" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["add"])?>">
									<div class="add" title="<?=GetMessage('TOCART_TEXT_DETAIL')?>"></div>
								</a>
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
<?