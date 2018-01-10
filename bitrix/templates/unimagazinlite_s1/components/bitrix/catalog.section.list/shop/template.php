<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog_section_list">
	<?foreach( $arResult["SECTIONS"] as $arItems ){?>
		<div class="section_item">		
			<div class="section_item_inner">
				<?
				$file="";
				$file=$arItems["PICTURE"]["SRC"];
				if(empty($file)){
					$file="/bitrix/templates/capitalim/img/noimage_group.png";
				}
				?>
				<div class="cataloglist_img" style="background:url(<?=$file?>) no-repeat center top; background-size:contain;"></div>
				<ul>
					<li class="name">
						<a href="<?=$arItems["SECTION_PAGE_URL"]?>"><?=$arItems["NAME"]?><? echo $arItems["ELEMENT_CNT"]?'&nbsp;('.$arItems["ELEMENT_CNT"].')':'';?></a> 
					</li>
					<?$i=0;?>
					<?foreach( $arItems["SECTIONS"] as $arItem){
						$i++;
						if($i>4){
						?>
						<li class="sect"><a href="<?=$arItems["SECTION_PAGE_URL"]?>"><?=GetMessage("ALL")?></a></li>
							<?break;
						}?>
						<li class="sect"><a href="<?=$arItem["SECTION_PAGE_URL"]?>"><?=$arItem["NAME"]?><? echo $arItem["ELEMENT_CNT"]?'&nbsp;('.$arItem["ELEMENT_CNT"].')':'';?></a></li>
					<?}?>
				</ul>
			</div>
		</div>
	<?}?>
</div>