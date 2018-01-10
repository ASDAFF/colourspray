<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
function drawSectionsUlLi ($sections, $classes) {
	$prevLevel = 0;
	foreach ($sections as $section) {
		$name = $section["NAME"];
		$level = $section["DEPTH_LEVEL"];
		$currentClasses = ($level > (count($classes)-1)) ? $classes[count($classes)-1] : $classes[$level];
		if ($level == $prevLevel) {
			echo "</li>\n";
		} elseif ($level < $prevLevel) {
			echo str_repeat("</li>\n</ul>\n", $prevLevel-$level)."</li>\n";
		} else {
			echo "\n<ul";
				if(!empty($currentClasses["ul"])) {
					echo " class=\"".$currentClasses["ul"]."\"";
				}
			echo ">\n";
		}
		echo "<li";
			if(!empty($currentClasses["li"])) {
				echo " class=\"".$currentClasses["li"]."\"";
			}
		echo ">";
		if ($section['SECTION_PAGE_URL'] == $_SERVER['REQUEST_URI']){
			echo "<a class='activ' href=\"".$section["SECTION_PAGE_URL"]."\">".$name."</a>";
		} else {		
			echo "<a href=\"".$section["SECTION_PAGE_URL"]."\">".$name."</a>";
		}
		$prevLevel = $level;
	}
	echo str_repeat("</li>\n</ul>\n", $prevLevel);
}
?>

<?
if(!empty($arResult)) {?>
	<div class="title_catalog">
		<?=GetMessage("CT_TITLE")?>
	</div>
	<div class="triangle"></div>
<?
	$classes = array(
		0 => array(
			"li"=>"li_dropdown",
		),
		1 => array(
			"li"=>"li_dropdown",
			"ul"=>"menu_left_block",
		),
		2 => array(
			"li"=>"li_dropdown_kat",
			"ul"=>"ul_left_menu",
		),
		3 => array(
			"li"=>"li_dropdown_kat2",
			"ul"=>"ul_left_menu2",
		),
	);
	if(is_array($arResult["SECTIONS"])){
		drawSectionsUlLi($arResult["SECTIONS"], $classes);
	}
}
?>
