<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>
<div class="menu_personal_order">
	<ul>
	<?
		if ($_REQUEST["filter_history"] == "Y")
		{
			?><li ><a href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=N"><?echo GetMessage("STPOL_CUR_ORDERS")?></a></li>
			<li class="active"><a href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=Y&filter_status=F"><?echo GetMessage("STPOL_ORDERS_HISTORY")?></a></li><?
		}
		else
		{
			?>
			<li class="active"><a class="left active" href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=N"><?echo GetMessage("STPOL_CUR_ORDERS")?></a></li>
			<li><a class="left " href="<?=$arResult["CURRENT_PAGE"]?>?filter_history=Y&filter_status=F"><?echo GetMessage("STPOL_ORDERS_HISTORY")?></a></li><?
		}		
	?>
	</ul>
	<div class="clear"></div>
	
</div>
<div class="hint">
	<p>
		<?echo GetMessage("STPOL_HINT")?>
	</p>
	<p>
		<?echo GetMessage("STPOL_HINT1")?>
	</p>
</div>
<div class="clear"></div>
<?$bNoOrder = true;
foreach($arResult["ORDER_BY_STATUS"] as $key => $val)
{
	$bShowStatus = true;
	foreach($val as $vval)
	{?>
<div class="order">	
	<h2 class="header_grey">
		<?echo GetMessage("STPOL_STATUS")?> "<?=$arResult["INFO"]["STATUS"][$key]["NAME"] ?>"
	</h2>
	<div class="hint"><?=$arResult["INFO"]["STATUS"][$key]["DESCRIPTION"]?></div>
	<div class="one_order">
		<div class="left_col">
			<div class="order_name">			
				<a href="<?=$vval["ORDER"]["URL_TO_DETAIL"] ?>">
				<?echo GetMessage("STPOL_ORDER_NO")?><?=$vval["ORDER"]["ACCOUNT_NUMBER"]?></a>
				<?echo GetMessage("STPOL_FROM")?>
				<?= $vval["ORDER"]["DATE_INSERT"]; ?>				
				<?
				if ($vval["ORDER"]["CANCELED"] == "Y")
					echo GetMessage("STPOL_CANCELED");
				?>
			</div>	
			<b>
			<?echo GetMessage("STPOL_SUM")?></b>
			<?=$vval["ORDER"]["FORMATED_PRICE"]?>
			
			<?if($vval["ORDER"]["PAYED"]=="Y")
				echo GetMessage("STPOL_PAYED_Y");
			else
				echo GetMessage("STPOL_PAYED_N");
			?>
			<br>
			<?if(IntVal($vval["ORDER"]["PAY_SYSTEM_ID"])>0)
				echo "<b>".GetMessage("P_PAY_SYS")."</b>".$arResult["INFO"]["PAY_SYSTEM"][$vval["ORDER"]["PAY_SYSTEM_ID"]]["NAME"]?>
			<br />
			<b><?echo GetMessage("STPOL_STATUS_T")?></b>
			<?=$arResult["INFO"]["STATUS"][$vval["ORDER"]["STATUS_ID"]]["NAME"]?>
			<?echo GetMessage("STPOL_STATUS_FROM")?>
			<?=$vval["ORDER"]["DATE_STATUS"];?>
			<br />
			<?if(IntVal($vval["ORDER"]["DELIVERY_ID"])>0)
			{
				echo "<b>".GetMessage("P_DELIVERY")."</b>".$arResult["INFO"]["DELIVERY"][$vval["ORDER"]["DELIVERY_ID"]]["NAME"];
			}
			elseif (strpos($vval["ORDER"]["DELIVERY_ID"], ":") !== false)
			{
				echo "<b>".GetMessage("P_DELIVERY")."</b>";
				$arId = explode(":", $vval["ORDER"]["DELIVERY_ID"]);
				echo $arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["NAME"]." (".$arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["PROFILES"][$arId[1]]["TITLE"].")";
			}
			?>			
		</div>	
		<div class="right_col">			
			<table class="sale_personal_order_list_table">		
				<tr>
					<td colspan="2" class="title_order"><?=GetMessage("STPOL_CONTENT")?></td>
					<td class="title_order"><?=GetMessage("STPOL_COUNT")?></td>
				</tr>
				<?
				foreach ($vval["BASKET_ITEMS"] as $vvval)
				{
					$measure = (isset($vvval["MEASURE_TEXT"])) ? $vvval["MEASURE_TEXT"] :GetMessage("STPOL_SHT");
					?>
					<tr>
						<td>
							<?
							CModule::IncludeModule("iblock");
							$res = CIBlockElement::GetByID($vvval["PRODUCT_ID"]);
							$ar_res = $res->GetNext();
							if(!empty($ar_res["DETAIL_PICTURE"])) 
							{
								$src = CFile::ResizeImageGet($ar_res["DETAIL_PICTURE"], array("width" => 82, "height"=> 71));
								$src = $src["src"];
							}
							else
							{
								$src = SITE_TEMPLATE_PATH."/images/noimg/noimg_minquadro.jpg";
							}
							?>
							<img src="<?=$src?>" style="max-width:82px;max-height:71px;">
						</td>
						<td>

							<?
							if (strlen($vvval["DETAIL_PAGE_URL"]) > 0)
								echo "<a href=\"".$vvval["DETAIL_PAGE_URL"]."\">";
							echo $vvval["NAME"];
							if (strlen($vvval["DETAIL_PAGE_URL"]) > 0)
								echo "</a>";
							?>
						</td>
						<td width="0%" nowrap><?= $vvval["QUANTITY"] ?> <?=$measure?></td>
					</tr>
					<?
				}
				?>
			</table>
		</div>
		<div class="clear"></div>
	</div>
	<div class="after_order right">
		<a title="<?= GetMessage("STPOL_DETAIL_ALT") ?>" href="<?=$vval["ORDER"]["URL_TO_DETAIL"]?>"><?= GetMessage("STPOL_DETAILS") ?></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a title="<?= GetMessage("STPOL_REORDER") ?>" href="<?=$vval["ORDER"]["URL_TO_COPY"]?>"><?= GetMessage("STPOL_REORDER1") ?></a>
		<?if ($vval["ORDER"]["CAN_CANCEL"] == "Y"):?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a title="<?= GetMessage("STPOL_CANCEL") ?>" href="<?=$vval["ORDER"]["URL_TO_CANCEL"]?>"><?= GetMessage("STPOL_CANCEL") ?></a>
		<?endif;?>		
	</div>
	<div class="clear"></div>
</div>
	<?}?>
<?}?>