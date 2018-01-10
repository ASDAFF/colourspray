<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
global $options;?>
<?if (!empty($arResult['ITEMS'])){?>
<div class="slider-wrapper">
	<div class="slider">
		<div class="title"><?=$arParams['TITLE']?></div>
	<?
		$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
		$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
		$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));?>
		
		<ul class="flex" id="<?=$arParams['FLEXISEL_ID']?>">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement){
		
			$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], $strElementEdit);
			$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		?>
			<li id="<?=$this->GetEditAreaId($arElement['ID']);?>">
				<div class="element">
					<div class="wrapper hover_shadow">
						<?if(!empty($arElement["DETAIL_PICTURE"]["SRC"])){
							$file = CFile::ResizeImageGet($arElement["DETAIL_PICTURE"],array('width'=>300, 'height'=>300),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
									$src=$file['src'];
								}else{
									$src=SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
							}?>
						<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="image">	
							<div class="wrapper uni-image">
								<div class="uni-aligner-vertical"></div>
								<img src="<?=$src?>" />
							</div>
						</a>
						<div class="information">
							<a class="name" href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
							<?if (empty($arElement['STARTSHOP']['OFFERS'])):?>
                                    <div class="price"><?=$arElement['STARTSHOP']['PRICES']['MINIMAL']['PRINT_VALUE']?></div>
							<?else:?>
								<?$arPrice = CStartShopToolsIBlock::GetOffersMinPrice($arElement);?>
								<?if (!empty($arPrice)):?>
									<div class="price"><?=GetMessage("PRICE_FROM")?> <?=$arPrice['PRINT_VALUE']?></div>
								<?endif;?>
								<?unset($arPrice);?>
							<?endif;?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</li>
		<?}?>
		</ul>
		
		<div class="clear"></div>		
	</div>
</div>
<script type="text/javascript">
	$('.slider #<?=$arParams['FLEXISEL_ID']?>.flex').flexisel({
        visibleItems: <?=$arParams['LINE_ELEMENT_COUNT']?>,
        animationSpeed: 500,		
        autoPlay: false,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
		  clone : false,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:480,
                visibleItems: 2
            }, 
				landscape: { 
                changePoint:768,
                visibleItems: 3
            },
            tablet: { 
                changePoint:600,
                visibleItems: 3
            },
				landscape: { 
                changePoint:1024,
                visibleItems: 3
            },           
				tablet: { 
                changePoint:240,
                visibleItems: 1
            }, 
        }
    });
</script>
	
<?}?>
 <link rel="stylesheet" href="<?=$templateFolder.'/style.css'?>">
 <? if ($arParams['LINE_ELEMENT_COUNT'] >= count($arResult['ITEMS'])) {?>
<style>
	#<?=$arParams['FLEXISEL_ID']?> + .nbs-flexisel-nav-left{display: none;}
	#<?=$arParams['FLEXISEL_ID']?> + .nbs-flexisel-nav-left + .nbs-flexisel-nav-right{display: none;}
</style>
<?}?>
