<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?if ($arParams["DISPLAY_TOP_PAGER"]=="Y"):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<div class="stuffs uni-tabs" id="tabs">
	<ul class="tabs">
		<?foreach( $arResult["SECTIONS"] as $key => $arSection ):?>
			<li class="tab">
				<a href="#<?=$key?>"><?=$arSection["NAME"];?></a>
			</li>
		<?endforeach;?>
		<li class="justifire"></li>
	</ul>
	<div class="clear"></div>	
	<?foreach( $arResult["SECTIONS"] as $key => $arSection ):?>
		<div class="section uni_parent_col" id="<?=$key?>">
			<?foreach ($arSection["ITEMS"] as $key => $arItem):?>
				<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>					
				<div class="stuff uni_col uni-25" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<?if( !empty( $arItem["PREVIEW_PICTURE"] ) ){
						$src = $arItem["PREVIEW_PICTURE"]["SRC"];
					}else{
						$src = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
					}?>
					<div class="image">
						<div class="wrapper">
							<div class="valign"></div>
							<img src="<?=$src?>">
						</div>
					</div>
					<div class="information">
						<div class="name">
							<?=$arItem["NAME"]?>
						</div>
						<div class="post">
							<?=$arItem["PROPERTIES"]["POST"]["VALUE"]?>
						</div>
						<div class="contacts">
							<div class="phone"><span><?=GetMessage('PHONE')?></span><?=$arItem["PROPERTIES"]["PHONE"]["VALUE"]?></div>
							<div class="email"><span><?=GetMessage('SKYPE')?></span><?=$arItem["PROPERTIES"]["SKYPE"]["VALUE"]?></div>
						</div>
					</div>
				</div>
			<?endforeach;?>
		</div>
	<?endforeach;?>
</div>
<div class="clear"></div>
<?if ($arParams["DISPLAY_BOTTOM_PAGER"]=="Y"):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
<script  type="text/javascript">
	$("#tabs").tabs();
</script>