<?
$properties = $arResult['DISPLAY_PROPERTIES'];
$properties = array_slice($properties, 0, 6);
?>
<?if (!empty($properties)):?>
<div class="startshop-indents-vertical indent-40"></div>
<div class="startshop-row">
    <div class="startshop-properties">
    	<?foreach ($properties as $property):?>
			<?if (!is_array($property['VALUE'])):?>
    			<div class="startshop-property"><?=$property['NAME']?> &mdash; <?=$property['VALUE']?>;</div>
			<?else:?>
				<div class="startshop-property"><?=$property['NAME']?> &mdash; <?=implode(', ', $property['VALUE'])?>;</div>
			<?endif;?>
    	<?endforeach;?>
    	<?if (count($properties) > 0):?>
    		<a href="#properties" class="startshop-all-properties startshop-link startshop-link-standart"><?=GetMessage('PRODUCT_PROPERTIES_ALL')?></a>
            <script type="text/javascript">
    			$(document).ready(function(){
    				$(".startshop-all-properties").click(function() {
    					var tabs = $('#tabs');
    					tabs.tabs("select", "#properties");
    				})
    			})
    		</script>
    	<?endif;?>
    </div>
</div>
<?endif;?>