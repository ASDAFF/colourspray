<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<? $this->setFrameMode(true) ?>
<? if (empty($arResult["ITEMS"])) return; ?>
<div class="list-news-1">
    <? $frame = $this->createFrame()->begin(); ?>
	<? foreach ($arResult['ITEMS'] as $item) { ?>
		<? $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_EDIT")); ?>
		<? $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('news.1.element.delete'))); ?>
		<?
			$image = null;
			
			if (!empty($item['PREVIEW_PICTURE']['SRC']) && empty($image)) {
				$image = CFile::ResizeImageGet(
					$item['PREVIEW_PICTURE'],
					array('width' => 190, 'height' => 300),
					BX_RESIZE_IMAGE_PROPORTIONAL_ALT
				);
			}
			
			if (!empty($item['DETAIL_PICTURE']['SRC']) && empty($image)) {
				$image = CFile::ResizeImageGet(
					$item['DETAIL_PICTURE'],
					array('width' => 190, 'height' => 300),
					BX_RESIZE_IMAGE_PROPORTIONAL_ALT
				);
			}
			
			if (empty($image)) {
				$image = SITE_TEMPLATE_PATH."/images/noimg/no-img.png";
			} else {
				$image = $image['src'];
			}
			
			$id = $item['ID'];			
			$name = $item['NAME'];
			$text = $item['PREVIEW_TEXT'];
			$date = $item['ACTIVE_FROM'];
			$url = $item['DETAIL_PAGE_URL'];
		?>
		<div class="list-news-1-item" id="<?= $this->getEditAreaId($id) ?>">
			<div class="list-news-1-item-wrap">
				<div class="list-news-1-image uni-image">
					<div class="uni-aligner-vertical"></div>
					<img src="<?= $image ?>" alt="<?= $name ?>" />
				</div>
				<div class="list-news-1-description">
					<? if (!empty($date)) { ?>
						<div class="list-news-1-date">
							<?= $date ?>
						</div>
					<? } ?>
					<a class="list-news-1-title" href="<?= $url ?>">
						<?= $name ?>
					</a>
					<div class="list-news-1-text">
						<?= $text ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	<? } ?>
</div>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) { ?>
	<div class="uni-indents-vertical indent-20"></div>
	<?= $arResult["NAV_STRING"] ?>
<? } ?>