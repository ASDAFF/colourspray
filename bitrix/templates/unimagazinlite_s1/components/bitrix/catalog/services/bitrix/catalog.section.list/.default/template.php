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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));?>

<?if (0 < $arResult["SECTIONS_COUNT"]):?>
	<?if ($arParams['VIEW_MODE'] == 'MENU'):?>
		<div class="services-sections-list menu">
			<?foreach ($arResult['SECTIONS'] as &$arSection):?>
				<?$arButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, $arSection['ID']);
				
				$this->AddEditAction($arSection['ID'], $arButtons['edit']['edit_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_CHANGE'));
				$this->AddDeleteAction($arSection['ID'], $arButtons['edit']['delete_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_DELETE'), $arSectionDeleteParams);?>
				<div class="element<?=$arSection['ID'] == $arResult['SECTION']['ID'] ? ' selected' : ''?>" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
					<div class="content">
						<a class="hover_link" href="<? echo $arSection["SECTION_PAGE_URL"]; ?>">
							<? echo $arSection["NAME"];?>
							<?if ($arParams["COUNT_ELEMENTS"]):?>
								<span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span>
							<?endif;?>
						</a>
						<div class="selector">
							<div class="uni-aligner-vertical"></div>
                            <i class="fa-angle-right fa"></i>
						</div>
					</div>
				</div>
			<?endforeach;?>
		</div>
	<?elseif ($arParams['VIEW_MODE'] == 'TILE'):?>
        <?
        switch ($arParams["LINE_SECTION_COUNT"]) {
        	case 3: $gridStyle = "uni-33"; break;
        	case 4: $gridStyle = "uni-25"; break;
        	case 5: $gridStyle = "uni-20"; break;
        	default : $gridStyle = "uni-50"; break;
        }
        ?>
		<div class="services-sections-list tile uni_parent_col">
			<?foreach ($arResult['SECTIONS'] as &$arSection):?>
				<?$picture = array();
				$picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
				
				if (!empty($arSection['PICTURE']))
				{
					$picture = CFile::ResizeImageGet($arSection['PICTURE']['ID'], array('width' => 500, 'height' => 500, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
				}
				
				$arButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, $arSection['ID']);
				
				$this->AddEditAction($arSection['ID'], $arButtons['edit']['edit_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_CHANGE'));
				$this->AddDeleteAction($arSection['ID'], $arButtons['edit']['delete_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_DELETE'), $arSectionDeleteParams);?>
				<div class="uni_col <?=' '.$gridStyle?>">
					<div class="element" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
						<a class="wrapper hover_shadow" href="<? echo $arSection["SECTION_PAGE_URL"]; ?>">
							<div class="image">
								<div>
									<div class="uni-aligner-vertical"></div>
									<img src="<?=$picture['src']?>" alt="<?=$arSection['NAME']?>" title="<?=$arSection['NAME']?>"/>
								</div>
							</div>
							<div class="text">
								<div class="text-wrapper"><? echo $arSection["NAME"];?></div>
							</div>
						</a>
					</div>
				</div>
			<?endforeach;?>
			<div class="description uni_col uni-100"><?=$arResult['IBLOCK']['DESCRIPTION']?></div>
		</div>
	<?elseif ($arParams['VIEW_MODE'] == 'TEXT'):?>
		<div class="services-sections-list uni_parent_col text">
			<?foreach ($arResult['SECTIONS'] as &$arSection):?>
				<?$arButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, $arSection['ID']);
						
				$this->AddEditAction($arSection['ID'], $arButtons['edit']['edit_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_CHANGE'));
				$this->AddDeleteAction($arSection['ID'], $arButtons['edit']['delete_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_DELETE'), $arSectionDeleteParams);?>
				<div class="element uni_col uni-50" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
					<div class="content">
						<a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>">
							<div class="name"><? echo $arSection["NAME"];?></div>
							<div class="description"><? echo $arSection["DESCRIPTION"];?></div>
						</a>
					</div>
				</div>
			<?endforeach;?>
			<div class="description uni_col uni-100"><?=$arResult['IBLOCK']['DESCRIPTION']?></div>
		</div>
	<?else:?>
		<div class="services-sections-list uni_parent_col list">
			<?foreach ($arResult['SECTIONS'] as &$arSection):?>
				<?$picture = array();
				$picture['src'] = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
					
				if (!empty($arSection['PICTURE']))
				{
					$picture = CFile::ResizeImageGet($arSection['PICTURE']['ID'], array('width' => 500, 'height' => 500, BX_RESIZE_IMAGE_PROPORTIONAL_ALT));
				}
					
				$arButtons = CIBlock::GetPanelButtons($arParams['IBLOCK_ID'], 0, $arSection['ID']);
				
				$this->AddEditAction($arSection['ID'], $arButtons['edit']['edit_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_CHANGE'));
				$this->AddDeleteAction($arSection['ID'], $arButtons['edit']['delete_section']['ACTION_URL'], GetMessage('CT_BCSL_ELEMENT_DELETE'), $arSectionDeleteParams);?>
				<div class="element uni_col uni-50" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
						<div class="content">
							<a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>">
								<div class="image">
									<div>
										<div class="uni-aligner-vertical"></div>
										<img src="<?=$picture['src']?>" alt="<?=$arSection['NAME']?>" title="<?=$arSection['NAME']?>"/>
									</div>
								</div>
								<div class="text">
									<div class="name">
										<? echo $arSection["NAME"];?>
									</div>
									<div class="description">
										<? echo $arSection["DESCRIPTION"];?>
									</div>
								</div>
							</a>
						</div>
					</div>
				<?endforeach;?>
			<div class="description uni_col uni-100"><?=$arResult['IBLOCK']['DESCRIPTION']?></div>
		</div>
	<?endif;?>
<?endif;?>