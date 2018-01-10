<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true)?>
<?
global $options;
$sections = array();
$parent = null;

foreach ($arResult['SECTIONS'] as $section) {
	$id = $section['ID'];
	$level = $section['DEPTH_LEVEL'];
	
	if ($level == 1) {
		$sections[$id] = $section;
		$parent = &$sections[$id];
	}
	
	if ($level == 2 && !empty($parent)) {
		$parent['SECTIONS'][$id] = $section;
	}
}

unset($parent);

$id = 'menu_catalog_'.spl_object_hash($component);

?>

<div class="submenu_mobile">

    <?foreach ($sections as $section) {?>
        <?if($section["DEPTH_LEVEL"]==1) {?>
            <a class="hover_link" href="<?=$section["SECTION_PAGE_URL"]?>"><?=$section["NAME"]?></a>
        <?}?>

    <?}?>
</div>
<!--
test123
<??>

-->
<?if ($options['MENU_CATALOG_SECTION']['ACTIVE_VALUE']=='with_subsection' && $arParams['SERVICES_MENU']!='Y'){?>
    <div class="menu-catalog-1" id="<?= $id ?>">
        <? foreach ($sections as $section) { ?>
            <div class="menu-catalog-1-item">
                <div class="menu-catalog-1-item-title">
                    <a href="<?= $section['SECTION_PAGE_URL'] ?>">
                        <?= $section['NAME'] ?>
                    </a>
                </div>
                <? if (!empty($section['SECTIONS'])) { ?>
                    <div class="menu-catalog-1-item-submenu">
                        <? foreach ($section['SECTIONS'] as $children) { ?>
                            <a class="menu-catalog-1-item-submenu-item hover_link"
                               href="<?= $children['SECTION_PAGE_URL'] ?>"
                            ><?= $children['NAME'] ?></a>
                        <? } ?>
                    </div>
                <? } ?>
            </div>
        <? } ?>
        <script type="text/javascript">
            (function ($) {
                $(document).ready(function () {
                    var menu = $('#<?= $id ?>');
                    var button = menu.parent();

                    button.on('mouseenter', function () {
                        menu.show();
                    }).on('mouseleave', function () {
                        menu.hide();
                    })
                })
            })(jQuery);
        </script>
    </div>
<?} else if ($options['MENU_CATALOG_SECTION']['ACTIVE_VALUE']=='without_subsection' || $arParams['SERVICES_MENU']=='Y'){?>
    <div class="child submenu">
        <? foreach ($sections as $section) { ?>
           
                    <a href="<?= $section['SECTION_PAGE_URL'] ?>" class="hover_link">
                        <?= $section['NAME'] ?>
                    </a>
               
        <? } ?>
    </div>
<?}?>