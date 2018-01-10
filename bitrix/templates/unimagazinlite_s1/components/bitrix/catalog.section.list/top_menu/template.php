<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();?>
<?
function drawSectionsUlLi1 ($sections, $classes) {
	$prevLevel = 0;	
	$count_1 = 0;
	foreach ($sections as $section) {
		$name = $section["NAME"];
		$level = $section["DEPTH_LEVEL"];
		$currentClasses = ($level > (count($classes)-1)) ? $classes[count($classes)-1] : $classes[$level];
		if($level == 1){
			$count_1++;
		}
		if($count_1 > 4){
			?>
			<li class="see_more <?=$classes[1]["li"]?>">
				<a href="">See MORE</a>
			</li>
			<?
		}
		if ($level == $prevLevel) {
			echo str_repeat("\t", $level)."</li>\n";
		} elseif ($level < $prevLevel) {
			echo str_repeat("</li>\n</ul>\n", $prevLevel-$level)."</li>\n";
		} else {
			echo "\n".str_repeat("\t", $level)."<ul";
				if(!empty($currentClasses["ul"])) {
					echo " class=\"".$currentClasses["ul"]."\"";
				}
			echo ">\n";
		}
		echo str_repeat("\t", $level)."<li";
			if(!empty($currentClasses["li"])) {
				echo " class=\"".$currentClasses["li"]."\"";
			}
		echo ">";
		if($level == "2" && $prevLevel == $level){
			$count++;
		} else {
			$count=0;
		}
		$active = 0;			
		if (CSite::InDir($section['SECTION_PAGE_URL'])){
			$active = 1;		
		}?>
		<a class="<?=$hide?"hide":""?> <?=$active?"active":""?>" href="<?=$section["SECTION_PAGE_URL"]?>"><?=$name?></a>			
		<?$prevLevel = $level;
	}
	echo str_repeat("</li>\n</ul>\n", $prevLevel);
}?>
<div class="top_menu">
	<div class="catalog_menu">
		<?if(!empty($arResult)) {
			$classes = array(
				0 => array(
					"li"=>"top_catalog",
				),
				1 => array(
					"li"=>"root_category_item",
					"ul"=>"root_category",
				),
				2 => array(
					"li"=>"sub_category_item",
					"ul"=>"sub_category",
				)
			);
			if(is_array($arResult["SECTIONS"])){
				drawSectionsUlLi1($arResult["SECTIONS"], $classes);	
			}	
		}?>
	</div>
</div>
<script>
	$(document).ready(
		function(){
			$(".i_menu .show_all").click(function(){				
				//$(".i_menu .show_all").show();
				//$(".i_menu .show_all").hide();
				//$(this).hide();
				$(".i_menu .submenu_1").removeClass("bordered");
				$(this).parent().parent().addClass("bordered");
			})			
		}
	)
	$(document).on("click",function(){
		$(".i_menu .show_all").show();
		$(".i_menu .submenu_1").removeClass("bordered");
	})
	$(document).on("click",".i_menu .submenu_1.bordered",function(e){
		e.preventDefault();
		return false;
	})
</script>
