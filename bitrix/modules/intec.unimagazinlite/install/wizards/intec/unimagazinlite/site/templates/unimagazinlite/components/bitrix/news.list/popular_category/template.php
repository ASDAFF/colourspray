<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>
<?if(!empty($arResult["ITEMS"]) && count($arResult["ITEMS"])){?>
	<div class="block_popular standart_block">
		<?if($arParams["TEXT_TITLE"]){?>
			<h3 class="header_grey"><?=$arParams["TEXT_TITLE"]?></h3>
		<?}?>
		<div class="uni_parent_col categories">
			<?foreach($arResult["ITEMS"] as $arItem){
	
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				
                switch ($arParams['GRID_SIZE'])
                {
                    case '2':
                    {
                        switch($arItem["PROPERTIES"]["SIZE_BLOCK"]["VALUE_XML_ID"]){
        					case "small": $class = "uni-50";break;
        					case "medium": $class = "uni-100";break;
        					case "big": $class = "uni-100";break;
        				}
                        
                        break;
                    } 
                    case '3':
                    {
                        switch($arItem["PROPERTIES"]["SIZE_BLOCK"]["VALUE_XML_ID"]){
        					case "small": $class = "uni-33";break;
        					case "medium": $class = "uni-66";break;
        					case "big": $class = "uni-100";break;
        				}
                        
                        break;
                    }                    
    				default:
                    {
                        switch($arItem["PROPERTIES"]["SIZE_BLOCK"]["VALUE_XML_ID"]){
        					case "small": $class = "uni-25";break;
        					case "medium": $class = "uni-50";break;
        					case "big": $class = "uni-75";break;
        				}
                        
                        break;
                    }
                }?>
				<div class="uni_col <?=$class?> one_categories">
					<a href="<?=$arItem["PROPERTIES"]["HREF"]["VALUE"];?>" class="image" title="<?=$arItem["NAME"]?>">
						<div class="wrapper">
							<div class="wrapper-shadow hover_shadow" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
								<div class="category-image" style="background-image:url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)"></div>
								<span class="name solid_element">
									<?=$arItem["NAME"]?>
								</span>
							</div>
                        </div>
					</a>
				</div>
			<?}?>
		</div>
	</div>
<?}?>
