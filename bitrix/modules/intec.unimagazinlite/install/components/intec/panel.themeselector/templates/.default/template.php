<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?$frame = $this->createFrame()->begin()?>
<!-- noidex -->
<form method="POST" class="change_settings">
	<div class="switch_loader_overlay">
	</div>
	<div class="spinner">
	  <div class="bounce1"></div>
	  <div class="bounce2"></div>
	  <div class="bounce3"></div>
	</div>
	<input type="hidden" name="action" value="select_theme">
	<div class="theme_switcher">
		<div class="panel_switcher">
			<div class="settings_icon">
				<i></i>
			</div>
			<ul class="panel_icons change_tab">
				<li id="change_tab_basic">
					<div class="icons basic_icon"></div>
					<div class="title"><?=GetMessage("BASIC_ICON_PANEL");?></div>
				</li>
				<li id="change_tab_color">
					<div class="icons color_icon"></div>
					<div class="title"><?=GetMessage("PANEL_ICON_COLOR");?></div>
				</li>
				<li id="change_tab_catalog">
					<div class="icons catalog_icon"></div>
					<div class="title"><?=GetMessage("CATALOG_ICON_PANEL");?></div>
				</li>				
				<?/*<li id="change_tab_structure">
					<div class="icons structure_icon"></div>
					<div class="title"><?=GetMessage("STRUCTURE_ICON_PANEL");?></div>
				</li>*/?>
			</ul>
		</div>
		<div class="settings_tabs">
			<div class="settings_title">
				<?=GetMessage("SETTINGS_TITLE");?>
			</div>
			<div class="set_over">
			<!-- COLOR SETTINGS -->
			<div class="change_tab_color change_tab_body">
				<div class="header"><?=$arResult["OPTIONS"]["GROUP:COLOR"]["GROUP:COLOR"]["LANG"];?></div>
				<div class="body">
					<div class="one_group">
						<div class="header2 clearfix">
							<div class="text"><?=$arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["LANG"];?></div>
							<?if($arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["TOOLTIP_TEXT"] || $arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["TOOLTIP_PICTURE"]){?>
								<div class="s_tooltip hover_shadow" 
										data-tooltip-text="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["TOOLTIP_TEXT"]?>"
										data-tooltip-img="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["TOOLTIP_PICTURE"]?>">
									<b>?</b>
								</div>
							<?}?>
						</div>
						<input type="hidden" name="COLOR_THEME" value="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["ACTIVE_VALUE"]?>">			
						<ul class="select_color color_theme">
							<?foreach($arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["VALUE"] as $key => $theme){?>
								<?if(strtolower($key) == "custom"){?>
									<li data-color="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["CUSTOM_COLOR"]["ACTIVE_VALUE"]?>" 
										 data-value="<?=$key?>" 
										 class="custom <?=$arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["ACTIVE_VALUE"]=="CUSTOM"?"current_theme":""?>" 
										 title="<?=$theme["NAME"]?>">
										<input type="hidden" name="CUSTOM_COLOR" value="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["CUSTOM_COLOR"]["ACTIVE_VALUE"]?>">
									</li>
								<?} else {?>
									<li data-color="<?=$theme["VALUE"]?>" 
										 data-value="<?=$key?>" 
										 class="<?=strtolower($arResult["OPTIONS"]["GROUP:COLOR"]["COLOR_THEME"]["ACTIVE_VALUE"]) == strtolower($key)?"current_theme":""?>">
										<div style="background-color:<?=$theme["VALUE"]?>" title="<?=$theme["NAME"]?>">
										</div>
									</li>
								<?}?>					
							<?}?>
						</ul>
					</div>
					<?/*<div class="one_group">
						<div class="header2 clearfix">
							<div class="text">
								<?=$arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["LANG"];?>
							</div>
							<?if($arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["TOOLTIP_TEXT"] || $arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["TOOLTIP_PICTURE"]){?>
								<div class="s_tooltip hover_shadow" 
										data-tooltip-text="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["TOOLTIP_TEXT"]?>"
										data-tooltip-img="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["TOOLTIP_PICTURE"]?>">
									<b>?</b>
								</div>
							<?}?>
						</div>
						<input type="hidden" name="BG_FOOTER_COLOR" value="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["ACTIVE_VALUE"]?>">			
						<ul class="select_color footer_color">
							<?foreach($arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["VALUE"] as $key => $theme){?>
								<?if(strtolower($key) == "custom"){?>
									<li data-color="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["BG_CUSTOM_COLOR"]["ACTIVE_VALUE"]?>" 
										 data-value="<?=$key?>" 
										 class="custom <?=$arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["ACTIVE_VALUE"]=="CUSTOM"?"current_theme":""?>"  
										 title="<?=$theme["NAME"]?>">
										<input type="hidden" name="BG_CUSTOM_COLOR" value="<?=$arResult["OPTIONS"]["GROUP:COLOR"]["BG_CUSTOM_COLOR"]["ACTIVE_VALUE"]?>">
									</li>
								<?} else {?>
									<li data-color="<?=$theme["VALUE"]?>" data-value="<?=$key?>" class="<?=strtolower($arResult["OPTIONS"]["GROUP:COLOR"]["BG_FOOTER_COLOR"]["ACTIVE_VALUE"]) == strtolower($key)?"current_theme":""?>">
										<div style="background-color:<?=$theme["VALUE"]?>" title="<?=$theme["NAME"]?>">
										</div>
									</li>
								<?}?>					
							<?}?>
						</ul>
					</div>*/?>
				</div>
			</div>			
			<!-- BASIC SETTINGS -->
			<div class="change_tab_basic change_tab_body">
				<div class="header"><?=$arResult["OPTIONS"]["GROUP:GLOBAL"]["GROUP:GLOBAL"]["LANG"];?></div>
				<div class="body">
					<?foreach($arResult["OPTIONS"]["GROUP:GLOBAL"] as $key => $element){
						if($key != "GROUP:GLOBAL" && $key != "SHOW_PANEL_SETTING"){?>
							<div class="one_group">
								<div class="header2 clearfix">
									<div class="text"><?=$element["LANG"];?></div>
									<div class="s_tooltip hover_shadow" style="display:none;" id = "tooltip-<?=md5($key);?>"
											data-tooltip-text=""
											data-tooltip-img="">
										<b>?</b>
									</div>
									
									<div class="toggle_element"><i></i></div></div>
								<div class="group_body clearfix">
									<?if($element["TYPE"] == "checkbox"){?>
										<input id="<?=$key?>[Y]" type="radio" name="<?=$key?>" value="Y" <?=$element["ACTIVE_VALUE"] == "Y"?"checked":"";?>> <label for = "<?=$key?>[Y]" class="checkbox"><?=GetMessage("PANEL_YES")?></label>
										<input id="<?=$key?>[N]" type="radio" name="<?=$key?>" value="N" <?=$element["ACTIVE_VALUE"] == "N"?"checked":"";?>> <label for = "<?=$key?>[N]" class="checkbox"><?=GetMessage("PANEL_NO")?></label>
									<?}?>
									<?if($element["TYPE"] == "selectbox"){?>
										<select class="select" name="<?=$key?>">
											<?foreach($element["VALUE"] as $el){?>
												<option value="<?=$el["VALUE"]?>" <?=$element["ACTIVE_VALUE"] == $el["VALUE"]?"selected":""?>>
													<?=$el["NAME"]?>
												</option>
											<?}?>
										</select>
									<?}?>
								</div>
							</div>
						<?}?>	
					<?}?>
				</div>			
			</div>
			<!-- CATALOG SETTINGS -->
			<div class="change_tab_catalog change_tab_body">
				<div class="header"><?=$arResult["OPTIONS"]["GROUP:CATALOG"]["GROUP:CATALOG"]["LANG"];?></div>
				<div class="body">
					<?foreach($arResult["OPTIONS"]["GROUP:CATALOG"] as $key => $element){
						if($key != "GROUP:CATALOG"){?>
							<div class="one_group">
								<div class="header2 clearfix">
									<div class="text"><?=$element["LANG"];?></div>
									<div class="s_tooltip hover_shadow" style="display:none;" id = "tooltip-<?=md5($key);?>"
											data-tooltip-text=""
											data-tooltip-img="">
										<b>?</b>
									</div>
									<div class="toggle_element"><i></i></div>
								</div>
								<div class="group_body clearfix">
									<?if($element["TYPE"] == "checkbox"){?>		
										<input id="<?=$key?>[Y]" type="radio" name="<?=$key?>" value="Y" <?=$element["ACTIVE_VALUE"] == "Y"?"checked":"";?>> <label for = "<?=$key?>[Y]" class="checkbox"><?=GetMessage("PANEL_YES")?></label>
										<input id="<?=$key?>[N]" type="radio" name="<?=$key?>" value="N" <?=$element["ACTIVE_VALUE"] == "N"?"checked":"";?>> <label for = "<?=$key?>[N]" class="checkbox"><?=GetMessage("PANEL_NO")?></label>
									<?}?>
									<?if($element["TYPE"] == "selectbox"){?>
										<select class="select" name="<?=$key?>">
											<?foreach($element["VALUE"] as $el){?>
												<option value="<?=$el["VALUE"]?>" <?=$element["ACTIVE_VALUE"] == $el["VALUE"]?"selected":""?>>
													<?=$el["NAME"]?>
												</option>
											<?}?>
										</select>
									<?}?>
								</div>
							</div>
						<?}?>	
					<?}?>
				</div>			
			</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="submit_form">
			<input type="submit" class="solid_button" value="<?=GetMessage("SUBMIT_TEXT")?>">
		</div>
	</div>
</form>
<!--TOOLTIP OBJECT-->
<script>
	var tooltipJSON = <?=json_encode($arResult["TOOL_TIP_JS"]);?>;
	tooltipJSON.setActiveTooltip = function(key, value) {
		tooltipJSON[key].ACTIVE_VALUE = value;		
		this.updateTooltip();
	} 
	tooltipJSON.updateTooltip = function() {
		for(key in tooltipJSON ){
			if(tooltipJSON[key].TOOLTIP_TEXT != null || tooltipJSON[key].TOOLTIP_PICTURE != null){
				//find active value
				if(tooltipJSON[key].TOOLTIP_TEXT != null){
					$("#tooltip-"+tooltipJSON[key].MD5).data("tooltipText", tooltipJSON[key].TOOLTIP_TEXT);
				}
				if(tooltipJSON[key].TOOLTIP_PICTURE != null) {				
					$("#tooltip-"+tooltipJSON[key].MD5).data("tooltipImg", tooltipJSON[key].TOOLTIP_PICTURE);
				}
				if(tooltipJSON[key].VALUE_TOOLTIP){
					for(keyval in tooltipJSON[key].VALUE_TOOLTIP){
						if(keyval == tooltipJSON[key].ACTIVE_VALUE ){
							if(tooltipJSON[key].VALUE_TOOLTIP[keyval].TOOLTIP_TEXT != null){
								$("#tooltip-"+tooltipJSON[key].MD5).data("tooltipText", tooltipJSON[key].VALUE_TOOLTIP[keyval].TOOLTIP_TEXT);
							}
							if(tooltipJSON[key].VALUE_TOOLTIP[keyval].TOOLTIP_PICTURE != null) {
								$("#tooltip-"+tooltipJSON[key].MD5).data("tooltipImg", tooltipJSON[key].VALUE_TOOLTIP[keyval].TOOLTIP_PICTURE);	
							}
						}
					}
				}
				$("#tooltip-"+tooltipJSON[key].MD5).show();
			}
		}
	}
	
	$(document).ready(function(){
		tooltipJSON.updateTooltip();
		var $select = $(".theme_switcher .select").select2({minimumResultsForSearch: Infinity});
		$select.on("select2:select",function(e){					
			var name = $(this).parent().find("select").attr("name");
			var val = e.params.data.id;
			
			tooltipJSON.setActiveTooltip(name,val);	
		})
		$('.settings_icon').click(function(e) {
			$("#change_tab_basic").click();
		})
		$('.change_tab li').click(function(){				
			var flag_active = false;
			if($(this).hasClass("active")){
				flag_active = true;
			}
			var classTab = $(this).attr("id");
			$('.change_tab li').removeClass("active");
			if($('.theme_switcher').hasClass("active") && flag_active){
				$('.theme_switcher').removeClass("active");
				$('.theme_switcher').animate({
					left:"-365px"
				},
				400,
				function() {
					$('.theme_switcher .change_tab').hide();
					$('.change_tab_body').hide();
					$('.admin_demo').show();
				});				

				
			}else{
				$('.admin_demo').hide();
				$('.theme_switcher .change_tab').show();
				$('.theme_switcher').addClass("active");
				$('.theme_switcher').animate({
					left:0
				},400);
				$('.change_tab_body').hide();
				$('.' + classTab).show();
				$(this).addClass("active");
			}
		});	
		//change color
		$("input[name='CUSTOM_COLOR']").spectrum({
			color: $("input[name='CUSTOM_COLOR']").val(),
			change: function(color) {
				color.toHexString();
				$("input[name='COLOR_THEME']").val("CUSTOM");
				$(this).parent().parent().find("li").removeClass("current_theme");
				$(this).parent().addClass("current_theme");
			},
			preferredFormat: "hex",
		});
		$("input[name='BG_CUSTOM_COLOR']").spectrum({
			color: $("input[name='BG_CUSTOM_COLOR']").val(),
			change: function(color) {
				color.toHexString();
				$("input[name='BG_FOOTER_COLOR']").val("CUSTOM");
				$(this).parent().parent().find("li").removeClass("current_theme");
				$(this).parent().addClass("current_theme");
			},
			preferredFormat: "hex",
		});
		$(".select_color.color_theme li, .select_color.footer_color li").click(function(){
			$(this).parent().find("li").removeClass("current_theme");
			$(this).addClass("current_theme");
			if($(this).parent().hasClass("color_theme")){
				$("input[name='COLOR_THEME']").val($(this).data("value"));
				if($(this).hasClass("current_theme")) {
					$("input[name='CUSTOM_COLOR']").val($(this).data("value"));
				}
			}
			if($(this).parent().hasClass("footer_color")){
				$("input[name='BG_FOOTER_COLOR']").val($(this).data("value"));
				if($(this).hasClass("current_theme")) {
					$("input[name='BG_CUSTOM_COLOR']").val($(this).data("value"));
				}
			}			
		});
		$(".theme_switcher .toggle_element").click(function(e){
			$(this).parent().next().slideToggle();
			$(this).toggleClass("hide");
		})
		$(".change_settings").submit(function(e){
			e.preventDefault();
			$('.spinner, .switch_loader_overlay').show();
			$.ajax({
				type: "POST",
				url: "<?=SITE_DIR?>",
				data:$(this).serialize()
			}).done(function(Res) {
				location.reload();
			});
			return false;
		});
		$('.s_tooltip').hover(
			function(e){
				var offset = $(this).offset();
				var text = $(this).data("tooltipText");				
				var img = $(this).data("tooltipImg");
				if(img.length > 0){					
					var element = $('<div class="body_tooltip"><div><img src="'+img+'"/></div></div>');				
				}else{					
					var element = $('<div class="body_tooltip"><div>'+text+'</div></div>');
				}
				element.css({top:(offset.top + $(this).outerHeight()/2 - 25 )+ "px",left: (offset.left + $(this).outerWidth() + 15) + "px"})
				$("body").append(element);
						
			},function(){
				$('.body_tooltip').remove();
			}
		)
	})
</script>
<!-- /noidex -->
<?$frame->end();?>