<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["STORES"]) > 0):?>
	<table class="table-standart stores_amount">
		<tr>
			<th><?=GetMessage("S_NAME")?></th>
			<?if ($arParams["SCHEDULE"]=="Y"):?><th class="s_scheldule"><?=GetMessage("S_SCHEDULE")?></th><?endif;?>
			<?if ($arParams["USE_STORE_PHONE"]=="Y"):?><th class="s_phone"><?=GetMessage("S_PHONE")?></th><?endif;?>
			<th><?=GetMessage("S_COUNT")?></th>
		</tr>
		<tr>
		
		<?foreach($arResult["STORES"] as $pid=>$arProperty){?>
			<tr>
				<td>
					<span><a href="<?=SITE_DIR?>stores/"><?=$arProperty["TITLE"]?></a></span>
				</td>
				<?if ($arParams["SCHEDULE"]=="Y"):?>
					<td align="center" class="s_scheldule"><?=$arProperty["SCHEDULE"]?></td>
				<?endif;?>
				<?if ($arParams["USE_STORE_PHONE"]=="Y"):?>
					<td align="center" class="s_phone"><?=$arProperty["PHONE"]?></td>
				<?endif;?>
				<td align="center">
					<?=$arProperty["AMOUNT"];?>
				</td>
			</tr>
		<?}?>
	</table>
<?endif;?>