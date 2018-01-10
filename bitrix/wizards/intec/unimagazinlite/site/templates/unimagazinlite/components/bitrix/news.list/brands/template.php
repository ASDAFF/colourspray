<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(is_array($arResult["ITEMS"])){?>
	<div class="brands_view_list">
	<?$brands = array();?>
		<?foreach( $arResult["ITEMS"] as $arItem ){
			
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<?$letter = substr($arItem["NAME"],0,1);
			$brands[$letter][$arItem["DETAIL_PAGE_URL"]]  = $arItem["NAME"];?>
		<?}?>
		<?ksort($brands);?>
		<?foreach($brands as $key => $brand){?>
			<div class="brand_letter">
				<div class="letter"><?=$key?></div>
				<?foreach($brand as $link => $brand_name){?>
					<a id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="brand_link" href="<?=$link?>">
						<?=$brand_name?>
					</a>
				<?}?>
			</div>
		<?}?>
	</div>
	<div class="clear"></div>
	<?=$arResult["NAV_STRING"]?>
<?}?>