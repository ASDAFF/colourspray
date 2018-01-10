<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
$this->setFrameMode(true);
global $APPLICATION;
$frame = $this->createFrame()->begin();
switch($arParams["LINE_ELEMENT_COUNT"]){
	case "1":
		$class_grid = "uni-100";
	break;
	case "2":
		$class_grid = "uni-50";
	break;
	case "3":
		$class_grid = "uni-33";
	break;
	case "4":
		$class_grid = "uni-25";
	break;
	case "5":
		$class_grid = "uni-20";
	break;
	case "6":
		$class_grid = "uni-16.6";
	break;
	default:
		$class_grid = "uni-25";
	break;		
}?>
<?if (!empty($arResult['ITEMS'])&&!empty($arResult['ITEMS'])) {?>
<?$id = rand(0,1000);?>
<div style="margin-left:-8px;margin-right:-8px;">
	<div class="popular_slider clearfix">	
		<ul class="popular clearfix" id="pop_slider_<?=$id?>">
			<?foreach( $arResult["ITEMS"] as $arItem ){				
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
				?>
				<?$db_groups = CIBlockElement::GetElementGroups($arItem["ID"], true);			
				while($ar_group = $db_groups->Fetch()){
					$parent_group = $ar_group["ID"];
					break;
				}
				$res = CIBlockSection::GetByID($parent_group);
				if($ar_res = $res->GetNext()){
					$name_parent_group = $ar_res['NAME'];
					$url_parent_group = $ar_res["SECTION_PAGE_URL"];
				}
				?>
				<li class="" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="one_section_product_cells hover_shadow">
						<?if(!empty($arItem["DETAIL_PICTURE"]["SRC"])){
							$file = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"],array('width'=>300, 'height'=>300),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
									$src=$file['src'];
								}else{
									$src=SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
							}?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="image_product" style="background-image:url(<?=$src?>)" title="<?=$arItem["NAME"];?>">	
							<div class="marks">
								<?if( $arItem["PROPERTIES"]["CML2_RECOMEND"]["VALUE"] ){?>
    								<span class="mark recommend"><?=GetMessage("MARK_RECOMEND");?></span>
    							<?}?>
								<?if( $arItem["PROPERTIES"]["CML2_NEW"]["VALUE"] ){?>
									<span class="mark new"><?=GetMessage("MESSAGE_NEW");?></span>
								<?}?>
								<?if( $arItem["PROPERTIES"]["CML2_HIT"]["VALUE"] ){?>
									<span class="mark hit"><?=GetMessage("MESSAGE_HIT");?></span>
								<?}?>
							</div>		
						</a>
                        <?if(empty($arItem['STARTSHOP']['OFFERS']) && $arParams["DISPLAY_COMPARE"]=="Y"):?>
    						<div class="min-buttons">
    							<div class="min-button compare">
    								<div class="add addToCompare addToCompare<?=$arItem["ID"]?>"
    									onclick="return addToCompare('<?=SITE_DIR?>', '<?=$arItem['IBLOCK_TYPE_ID']?>','<?=$arItem["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=$arItem['COMPARE_URL']?>')" 
    									title="<?=GetMessage('COMPARE_TEXT_DETAIL')?>"
    								>
    								</div>
    								<div class="remove removeFromCompare removeFromCompare<?=$arItem["ID"]?>"
    									style="display:none"
    									onclick="return removeFromCompare('<?=SITE_DIR?>', '<?=$arItem['IBLOCK_TYPE_ID']?>','<?=$arItem["IBLOCK_ID"]?>','<?=$arParams["COMPARE_NAME"]?>','<?=$arItem['COMPARE_REMOVE_URL']?>')"
    									title="<?=GetMessage('COMPARE_DELETE_TEXT_DETAIL')?>"
    								>
    								</div>
    							</div>
    						</div>
    					<?endif?>		
						<div class="name_product title_product">
							<a class="name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
							<a class="name_group" href="<?=$url_parent_group ?>"><?=$name_parent_group;?></a>
						</div>				
						<div class="buys">		
							<div class="price_block">							
								<?if (empty($arItem['STARTSHOP']['OFFERS'])):?>
                                    <div class="new_price"><?=$arItem['STARTSHOP']['PRICES']['MINIMAL']['PRINT_VALUE']?></div>
                                <?else:?>
                                    <?$arPrice = CStartShopToolsIBlock::GetOffersMinPrice($arItem);?>
                                    <?if (!empty($arPrice)):?>
                                        <div class="new_price"><?=GetMessage("FROM")?> <?=$arPrice['PRINT_VALUE']?></div>
                                    <?endif;?>
                                    <?unset($arPrice);?>
                                <?endif;?>			
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</li>
			<?}?>
		</ul>
	</div>
</div>
<script>
	$('#pop_slider_<?=$id?>').flexisel({
        visibleItems: <?=$arParams["LINE_ELEMENT_COUNT"]?>,
        animationSpeed: 500,		
        autoPlay: false,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
		  clone : false,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:640,
                visibleItems: 2
            }, 
				landscape: { 
                changePoint:640,
                visibleItems: 3
            },
            tablet: { 
                changePoint:1000,
                visibleItems: 3
            },
				landscape: { 
                changePoint:1000,
                visibleItems: 3
            },           
				tablet: { 
                changePoint:350,
                visibleItems: 1
            }, 
        }
    });
</script>
<?}?>
<?$frame->end();?>