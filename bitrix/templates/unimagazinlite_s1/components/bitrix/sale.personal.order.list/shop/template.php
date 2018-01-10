<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="personal_list">
	<table class="table-standart">
		<tr>
			<th><?=GetMessage("SPOL_T_ID")?><br /><?//=SortingEx("ID")?></th>		
			<th class="cart-history-status"><?=GetMessage("SPOL_T_STATUS")?><br /><?//=SortingEx("STATUS_ID")?></th>
			<th><?=GetMessage("SPOL_T_PRICE")?><br /><?//=SortingEx("PRICE")?></th>
			<th class="cart-history-name"><?=GetMessage("SPOL_T_BASKET")?><br /></th>
			<?/*<th class="cart-history-payed"><?=GetMessage("SPOL_T_PAYED")?><br /><?//=SortingEx("PAYED")?></th>
			<th class="cart-history-canceled"><?=GetMessage("SPOL_T_CANCELED")?><br /><?//=SortingEx("CANCELED")?></th>*/?>
			<th  class="cart-history-name"><?=GetMessage("SPOL_T_PAY_SYS")?><br /></th>
			<th><?=GetMessage("SPOL_T_ACTION")?></th>
		</tr>
		<?foreach($arResult["ORDERS"] as $val):?>
			<tr>
				<td><a href="<?=$val["ORDER"]["URL_TO_DETAIL"]?>">¹ <?=$val["ORDER"]["ID"]?></a><br /><?='('.$val["ORDER"]["DATE_INSERT_FORMAT"].")"?></td>
				<td class="cart-history-status"><?=$arResult["INFO"]["STATUS"][$val["ORDER"]["STATUS_ID"]]["NAME"]?><br /><?=$val["ORDER"]["DATE_STATUS"]?></td>
				<td><?=$val["ORDER"]["FORMATED_PRICE"]?></td>			
				<td class="cart-history-name"><?
					$bNeedComa = False;
					foreach($val["BASKET_ITEMS"] as $vval)
					{
						?><li><?
						if (strlen($vval["DETAIL_PAGE_URL"])>0) 
							echo '<a href="'.$vval["DETAIL_PAGE_URL"].'">';
						echo $vval["NAME"];
						if (strlen($vval["DETAIL_PAGE_URL"])>0) 
							echo '</a>';
							echo ' - '.$vval["QUANTITY"].' '.GetMessage("STPOL_SHT");
						?></li><?
					}
				?></td>
				<?/*<td class="cart-history-payed"><?=(($val["ORDER"]["PAYED"]=="Y") ? GetMessage("SPOL_T_YES") : GetMessage("SPOL_T_NO"))?></td>
				<td class="cart-history-canceled"><?=(($val["ORDER"]["CANCELED"]=="Y") ? GetMessage("SPOL_T_YES") : GetMessage("SPOL_T_NO"))?></td>*/?>
				<td  class="cart-history-delivery">
					<?=$arResult["INFO"]["PAY_SYSTEM"][$val["ORDER"]["PAY_SYSTEM_ID"]]["NAME"]?> / 
					<?if (strpos($val["ORDER"]["DELIVERY_ID"], ":") === false):?>
						<?=$arResult["INFO"]["DELIVERY"][$val["ORDER"]["DELIVERY_ID"]]["NAME"]?>
					<?else:
						$arId = explode(":", $val["ORDER"]["DELIVERY_ID"]);
					?>
						<?=$arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["NAME"]?> (<?=$arResult["INFO"]["DELIVERY_HANDLERS"][$arId[0]]["PROFILES"][$arId[1]]["TITLE"]?>)
					<?endif?>
				</td>
				<td>
					<a title="<?=GetMessage("SPOL_T_COPY_ORDER_DESCR")?>" href="<?=$val["ORDER"]["URL_TO_COPY"]?>"><?=GetMessage("SPOL_T_COPY_ORDER")?></a><br />
					<?if($val["ORDER"]["CAN_CANCEL"] == "Y"):?>
						<a title="<?=GetMessage("SPOL_T_DELETE_DESCR")?>" href="<?=$val["ORDER"]["URL_TO_CANCEL"]?>"><?=GetMessage("SPOL_T_DELETE")?></a>
					<?endif;?>
				</td>
			</tr>
		<?endforeach;?>
	</table>
</div>
<?if(strlen($arResult["NAV_STRING"]) > 0):?>
	<p><?=$arResult["NAV_STRING"]?></p>
<?endif?>