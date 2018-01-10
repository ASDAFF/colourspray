<?
    IncludeModuleLangFile(__FILE__);
    return array(
		"GROUP:GLOBAL" => array(
			"LANG" => GetMessage("GROUP:GLOBAL"),
			"ACTIVE_VALUE"=>"",
			"TYPE" => "caption",
			"VALUE" => ""
		),
		"SHOW_PANEL_SETTING" => array(
			"LANG" => GetMessage("SHOW_PANEL_SETTING"),
			"DEFAULT_VALUE"=>"N",
			"ACTIVE_VALUE"=>"",
			"TYPE" => "checkbox",
			"VALUE" => "Y"
		),
		"TYPE_MAIN_PAGE" => array(
			"LANG" => GetMessage("TYPE_MAIN_PAGE"),
			"DEFAULT_VALUE" => "normal",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"normal" => array(
					"NAME" => GetMessage("TYPE_MAIN_PAGE_NAME"),
					"VALUE" => "normal"
				),
				"landing" => array(
					"NAME" => GetMessage("TYPE_MAIN_PAGE_LANDING"),
					"VALUE" => "landing"
				)					
			)
		),
		"HIDE_MAIN_BANNER" => array(
			"LANG" => GetMessage("HIDE_MAIN_BANNER"),
			"DEFAULT_VALUE" => "",
			"ACTIVE_VALUE" => "",
			"TYPE" => "checkbox",
			"VALUE" => "Y"
		),
		"TYPE_PHONE" => array(
			"LANG" => GetMessage("TYPE_PHONE"),
			"DEFAULT_VALUE" => "header",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",				
			"VALUE" => array(
				"top" => array(
					"NAME" => GetMessage("TYPE_PHONE_TOP"),
					"VALUE" => "top"
				),
				"header" => array(
					"NAME" => GetMessage("TYPE_PHONE_HEADER"),
					"VALUE" => "header"
				)			
			)
		),
		"TYPE_BASKET" => array(
			"LANG" => GetMessage("TYPE_BASKET"),
			"DEFAULT_VALUE" => "fly",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"top" => array(
					"NAME" => GetMessage("TYPE_BASKET_TOP"),
					"VALUE" => "top"
				),
				"header" => array(
					"NAME" => GetMessage("TYPE_BASKET_HEADER"),
					"VALUE" => "header"
				),
				"fly" => array(
					"NAME" => GetMessage("TYPE_BASKET_FLY"),
					"VALUE" => "fly"
				),
				"none" => array(
					"NAME" => GetMessage("TYPE_NONE"),
					"VALUE" => "none"
				)					
			)
		),
		"TYPE_TOP_MENU" => array(
			"LANG" => GetMessage("TYPE_TOP_MENU"),
			"DEFAULT_VALUE" => "BORDER_MENU",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"solid" => array(
					"NAME" => GetMessage("SOLID_MENU"),
					"VALUE" => "solid"
				),
				"transparent" => array(
					"NAME" => GetMessage("TRANSPARENT_MENU"),
					"VALUE" => "transparent"
				),
				"border" => array(
					"NAME" => GetMessage("BORDER_MENU"),
					"VALUE" => "border"
				)			
			)
		),
		"MENU_WIDTH_SIZE" => array(
			"LANG" => GetMessage("MENU_WIDTH_SIZE"),
			"DEFAULT_VALUE"=>"N",
			"ACTIVE_VALUE"=>"",
			"TYPE" => "checkbox",
			"VALUE" => "N"
		),
		"POSITION_TOP_MENU" => array(
			"LANG" => GetMessage("POSITION_TOP_MENU"),
			"DEFAULT_VALUE" => "top",
			"ACTIVE_VALUE" => "top",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"top" => array(
					"NAME" => GetMessage("POSITION_TOP_MENU_ORIGINAL"),
					"VALUE" => "top"
				),
				"header" => array(
					"NAME" => GetMessage("POSITION_TOP_MENU_HEADER"),
					"VALUE" => "header"
				),
				"catalog" => array(
					"NAME" => GetMessage("POSITION_TOP_MENU_CATALOG"),
					"VALUE" => "catalog"
				)						
			)
		),
		"MENU_CATALOG_SECTION" => array(
        "LANG" => GetMessage("MENU_CATALOG_SECTION"),
        "DEFAULT_VALUE" => "with_subsection",
        "ACTIVE_VALUE" => "with_subsection",
        "TYPE" => "selectbox",
        "VALUE" => array(
            "with_subsection" => array(
                "NAME" => GetMessage("MENU_CATALOG_SECTION_WITH_SUBSECTION"),
                "VALUE" => "with_subsection"
            ),
            "without_subsection" => array(
                "NAME" => GetMessage("MENU_CATALOG_SECTION_WITHOUT_SUBSECTION"),
                "VALUE" => "without_subsection"
				)
			)
		),
		"HEADER_WIDTH_SIZE" => array(
			"LANG" => GetMessage("HEADER_WIDTH_SIZE"),
			"DEFAULT_VALUE"=>"N",
			"ACTIVE_VALUE"=>"",
			"TYPE" => "checkbox",
			"VALUE" => "N"
		),
		"SHOW_BUTTON_TOP" => array(
			"LANG" => GetMessage("SHOW_BUTTON_TOP"),
			"DEFAULT_VALUE"=>"Y",
			"ACTIVE_VALUE"=>"",
			"TYPE" => "checkbox",
			"VALUE" => "Y"
		),	
		"ADAPTIV" => array(
			"LANG" => GetMessage("ADAPTIV"),
			"DEFAULT_VALUE"=>"Y",
			"ACTIVE_VALUE"=>"",
			"TYPE" => "checkbox",
			"VALUE" => "N"
		),		
		"GROUP:COLOR" => array(
			"LANG" => GetMessage("GROUP:COLOR"),
			"ACTIVE_VALUE"=>"",
			"TYPE" => "caption",
			"VALUE" => ""
		),
		"COLOR_THEME" => array(
			"LANG" => GetMessage("COLOR_THEME"),
			"DEFAULT_VALUE" => "BLUE",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"TOOLTIP_TEXT" => GetMessage("TOOLTIP_COLOR_THEME"),
			"TOOLTIP_PICTURE" => "",
			"VALUE" => array(
				"BLUE" => array(
					"NAME" => GetMessage("NAME_COLOR_BLUE"),
					"VALUE" =>"#1d6eb1",
					"TOOLTIP_TEXT" => "",
					"TOOLTIP_PICTURE" => ""						
				),
				"LIGHT-BLUE" => array(
					"NAME" => GetMessage("NAME_LIGHT_BLUE"),
					"VALUE" => "#0089e5"
				),
				"DARK-BLUE" => array(
					"NAME" => GetMessage("NAME_DARK_BLUE"),
					"VALUE" => "#032039"
				),
				"MIDNIGHT-BLUE" => array(
					"NAME" => GetMessage("NAME_MIDNIGHT_BLUE"),
					"VALUE" => "#2c2f47"
				),
				"GRAY" => array(
					"NAME" => GetMessage("NAME_COLOR_GRAY"),
					"VALUE" =>"#708090"			
				),
				"VIOLET" => array(
					"NAME" => GetMessage("NAME_COLOR_VIOLET"),
					"VALUE" =>"#9370DB"			
				),
				"BLUE-VIOLET" => array(
					"NAME" => GetMessage("NAME_COLOR_BLUE_VIOLET"),
					"VALUE" =>"#6959CD"			
				),
				"GOLDER-ROD" => array(
					"NAME" => GetMessage("NAME_GOLDER_ROD"),
					"VALUE" => "#DAA520"
				),
				"BURLY-WOOD" => array(
					"NAME" => GetMessage("NAME_BURLY_WOOD"),
					"VALUE" => "#cea073"
				),
				"DARK-OLIVE-GREEN" => array(
					"NAME" => GetMessage("NAME_DARK_OLIVE_GREEN"),
					"VALUE" => "#486b46"
				),
				"DARK-GREEN" => array(
					"NAME" => GetMessage("NAME_DARK_GREEN"),
					"VALUE" => "#216b52"
				),
				"FOREST-GREEN" => array(
					"NAME" => GetMessage("NAME_FOREST_GREEN"),
					"VALUE" => "#0d932e"
				),		
				"MAROON" => array(
					"NAME" => GetMessage("NAME_MAROON"),
					"VALUE" => "#800000"
				),					
				"ORANGE-RED" => array(
					"NAME" => GetMessage("NAME_ORANGE-RED"),
					"VALUE" => "#e83521"
				),
				
				"SALMON" => array(
					"NAME" => GetMessage("NAME_SALMON"),
					"VALUE" => "#FA8072"
				),
				"CUSTOM" => array(
					"NAME" => GetMessage("NAME_COLOR_CUSTOM"),
					"VALUE" =>""			
				)
			)
		),
		"CUSTOM_COLOR" => array(
			"LANG" => GetMessage("CUSTOM_COLOR"),
			"DEFAULT_VALUE"=>"",
			"ACTIVE_VALUE"=>"",
			"TYPE" => "text",
			"VALUE" => ""
		),
		"GROUP:CATALOG" => array(
			"LANG" => GetMessage('GROUP:CATALOG'),
			"ACTIVE_VALUE"=>"",
			"TYPE" => "caption",
			"VALUE" => ""
		),
		"CATALOG_VIEW" => array(
			"LANG" => GetMessage("CATALOG_VIEW"),
			"DEFAULT_VALUE" => "tile",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"tile" => array(
					"NAME" => GetMessage("CATALOG_VIEW_TILE"),
					"VALUE" => "tile",
				),
				"list" => array(
					"NAME" => GetMessage("CATALOG_VIEW_LIST"),
					"VALUE" => "list",
				),
				"text" => array(
					"NAME" => GetMessage("CATALOG_VIEW_TEXT"),
					"VALUE" => "text",
				),						
			)
		),
		"CATALOG_SECTION_DEFAULT_VIEW" => array(
			"LANG" => GetMessage("CATALOG_SECTION_DEFAULT_VIEW"),
			"DEFAULT_VALUE" => "tile",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"TOOLTIP_PICTURE" => "catalog_section_tile.png",
			"VALUE" => array(
				"tile" => array(
					"NAME" => GetMessage("CATALOG_SECTION_DEFAULT_VIEW_TILE"),
					"VALUE" => "tile",
					"TOOLTIP_PICTURE" => "catalog_section_tile.png",
				),
				"list" => array(
					"NAME" => GetMessage("CATALOG_SECTION_DEFAULT_VIEW_LIST"),
					"VALUE" => "list",
					"TOOLTIP_PICTURE" => "catalog_section_list.png",
				),
				"text" => array(
					"NAME" => GetMessage("CATALOG_SECTION_DEFAULT_VIEW_TEXT"),
					"VALUE" => "text",
					"TOOLTIP_PICTURE" => "catalog_section_text.png",
				),						
			)
		),
		"CATALOG_PRODUCT_IMAGE_VIEW" => array(
			"LANG" => GetMessage("CATALOG_PRODUCT_IMAGE_VIEW"),
			"DEFAULT_VALUE" => "WITH_FANCY",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
		   "WITHOUT_EFFECTS" => array(
					"NAME" => GetMessage("CATALOG_PRODUCT_IMAGE_WITHOUT_EFFECTS"),
					"VALUE" => "WITHOUT_EFFECTS"
				),
				"WITH_ZOOM" => array(
					"NAME" => GetMessage("CATALOG_PRODUCT_IMAGE_WITH_ZOOM"),
					"VALUE" => "WITH_ZOOM"
				),
				"WITH_FANCY" => array(
					"NAME" => GetMessage("CATALOG_PRODUCT_IMAGE_WITH_FANCY"),
					"VALUE" => "WITH_FANCY"
				)						
			)
		),
		"CATALOG_PRODUCT_VIEW" => array(
			"LANG" => GetMessage("CATALOG_PRODUCT_VIEW"),
			"DEFAULT_VALUE" => "WITH_TABS",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"TOOLTIP_PICTURE" => "product_view_tabs.png",
			"VALUE" => array(
				"WITH_TABS" => array(
					"NAME" => GetMessage("CATALOG_PRODUCT_VIEW_WITH_TABS"),
					"VALUE" => "WITH_TABS",
					"TOOLTIP_PICTURE" => "product_view_tabs.png"
				),
				"WITHOUT_TABS" => array(
					"NAME" => GetMessage("CATALOG_PRODUCT_VIEW_WITHOUT_TABS"),
					"VALUE" => "WITHOUT_TABS",
					"TOOLTIP_PICTURE" => "product_view_without_tabs.png",
				),
				"WITH_TABS_UP" => array(
					"NAME" => GetMessage("CATALOG_PRODUCT_VIEW_WITH_TABS_UP"),
					"VALUE" => "WITH_TABS_UP",
					"TOOLTIP_PICTURE" => "product_view_with_tabs.png",
				)
			)
		),
		"CATALOG_PRODUCT_MENU" => array(
			"LANG" => GetMessage("CATALOG_PRODUCT_MENU"),
			"DEFAULT_VALUE" => "N",
			"ACTIVE_VALUE" => "",
			"TYPE" => "checkbox"
		),
		"CATALOG_PRODUCT_MIN_PROPERTIES" => array(
			"LANG" => GetMessage("CATALOG_PRODUCT_MIN_PROPERTIES"),
			"DEFAULT_VALUE" => "N",
			"ACTIVE_VALUE" => "",
			"TYPE" => "checkbox"
		),
		"SERVICES_VIEW" => array(
			"LANG" => GetMessage("SERVICES_VIEW"),
			"DEFAULT_VALUE" => "WITH_TABS",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"WITH_TABS" => array(
					"NAME" => GetMessage("SERVICES_VIEW_WITH_TABS"),
					"VALUE" => "WITH_TABS"
				),
				"WITHOUT_TABS" => array(
					"NAME" => GetMessage("SERVICES_VIEW_WITHOUT_TABS"),
					"VALUE" => "WITHOUT_TABS"
				),
				"LANDING" => array(
					"NAME" => GetMessage("SERVICES_VIEW_LANDING"),
					"VALUE" => "LANDING"
				)						
			)
		),
		"SERVICES_CATALOG_DEFAULT_VIEW" => array(
			"LANG" => GetMessage("SERVICES_CATALOG_DEFAULT_VIEW"),
			"DEFAULT_VALUE" => "TILE",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"TILE" => array(
					"NAME" => GetMessage("SERVICES_CATALOG_DEFAULT_VIEW_TILE"),
					"VALUE" => "TILE"
				),
				"LIST" => array(
					"NAME" => GetMessage("SERVICES_CATALOG_DEFAULT_VIEW_LIST"),
					"VALUE" => "LIST"
				),
				"TEXT" => array(
					"NAME" => GetMessage("SERVICES_CATALOG_DEFAULT_VIEW_TEXT"),
					"VALUE" => "TEXT"
				),						
			)
		),
		"SERVICES_SECTION_DEFAULT_VIEW" => array(
			"LANG" => GetMessage("SERVICES_SECTION_DEFAULT_VIEW"),
			"DEFAULT_VALUE" => "tile",
			"ACTIVE_VALUE" => "",
			"TYPE" => "selectbox",
			"VALUE" => array(
				"tile" => array(
					"NAME" => GetMessage("SERVICES_SECTION_DEFAULT_VIEW_TILE"),
					"VALUE" => "tile"
				),
				"list" => array(
					"NAME" => GetMessage("SERVICES_SECTION_DEFAULT_VIEW_LIST"),
					"VALUE" => "list"
				),
				"extend" => array(
					"NAME" => GetMessage("SERVICES_SECTION_DEFAULT_VIEW_EXTEND"),
					"VALUE" => "extend"
				),						
			)
		)
	);
?>