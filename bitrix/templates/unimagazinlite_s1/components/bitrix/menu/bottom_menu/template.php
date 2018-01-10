<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true)?>
<?if(!empty($arResult)){?>
    <div class="bottom_menu_wrap">
    	<?foreach( $arResult as $arItem ){?>
    		<div class="bottom_menu">
    			<div class="menu_title"><a class="hover_link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></div>
    			<?if(!empty($arItem["ITEMS"])){?>
    				<?foreach( $arItem["ITEMS"] as $arSubItem ){?>
    					<div class="menu_item"><a class="hover_link" href="<?=$arSubItem["LINK"]?>"><?=$arSubItem["TEXT"]?></a></div>
    				<?}?>
    			<?}?>
    		</div>
    	<?}?>
    </div>
<?}?>