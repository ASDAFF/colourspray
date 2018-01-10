<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(is_array($arResult["SECTIONS"])){?>
	<h3 class="header_grey"><?=$arParams["TEXT_RUBLICS"]?></h3>
	<div class="catalog-sections-top">
		<ul>
			<?foreach($arResult["SECTIONS"] as $arSection){?>
				<?
					//print_r($arSection);
					$this->AddEditAction($arSection['ID'],  $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction( $arSection['ID'],  $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCST_ELEMENT_DELETE_CONFIRM')));
				?>
				<li class="one_section" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
					<?
					$file = CFile::ResizeImageGet($arSection["PICTURE"]["ID"],array('width'=>400, 'height'=>400),BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
					$src=$file["src"];
					if(empty($src)){
						$src=SITE_TEMPLATE_PATH."/images/noimg_min.jpg";
					}?>
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="img_banner" style="background-image:url(<?=$src?>)">
					</a>					
					<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="name">
						<?=$arSection["NAME"]?>
					</a>
				</li>
			<?}?>
		</ul>
	</div>
<?}?>