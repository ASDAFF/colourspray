<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
<?if(count($arResult["ITEMS"])>3){?>
	<div class="bx_brand">	
		<ul id="carouselbrand" class="elastislide-list">
			<?foreach($arResult["ITEMS"] as $cell=>$arElement){?>
				<?$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
				?>			
				<li class="one_brand" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
					<?if(!empty($arElement["PREVIEW_PICTURE"]["SRC"])){
						$file = CFile::ResizeImageGet($arElement["PREVIEW_PICTURE"],array('width'=>400, 'height'=>400),"BX_RESIZE_IMAGE_PROPORTIONAL_ALT");
						$src=$file['src'];
					}else{
						$src=0;//SITE_TEMPLATE_PATH."/images/noimg_min.jpg";
					}?>
					<a href="<?=$arElement['DETAIL_PAGE_URL']?>" class="img_brand">
						<?if($src){?>
							<img src="<?=$src?>" alt="<?=$arElement['NAME'];?>">
						<?}else{
							echo $arElement["NAME"];
						}?>
					</a>	
				</li>
			<?}?>
		</ul>
		<div class="clear"></div>
	</div>
	<script type="text/javascript">
		$('#carouselbrand').flexisel({
        visibleItems: 6,
        animationSpeed: 500,		
        autoPlay: false,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
			landscape: { 
                changePoint:768,
                visibleItems: 4
            },
			landscape: { 
                changePoint:1024,
                visibleItems: 5
            },  
			portrait: { 
                changePoint:600,
                visibleItems: 3
            },
            portrait: { 
                changePoint:480,
                visibleItems: 2
            }, 	
			portrait: { 
                changePoint:480,
                visibleItems: 2
            }, 				
			tablet: { 
                changePoint:240,
                visibleItems: 1
            }, 			
        }
    });
	</script>
<?}?>
<div class="clear"></div>