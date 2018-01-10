<?
    if (CModule::IncludeModule('intec.unimagazinlite'))
    {
		UniMagazinLite::InitProtection();
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'SHOW_PANEL_SETTING', "Y", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'TYPE_MAIN_PAGE', "landing", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'HIDE_MAIN_BANNER', "Y", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'TYPE_PHONE', "header", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'TYPE_BASKET', "header", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'TYPE_TOP_MENU', "solid", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'MENU_WIDTH_SIZE', "Y", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'POSITION_TOP_MENU', "top", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'HEADER_WIDTH_SIZE', "Y", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'SHOW_BUTTON_TOP', "Y", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'ADAPTIV', "Y", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'CATALOG_VIEW', "tile", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'CATALOG_SECTION_DEFAULT_VIEW', "tile", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'CATALOG_PRODUCT_VIEW', "WITH_TABS", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'CATALOG_PRODUCT_MENU', "N", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'CATALOG_PRODUCT_MIN_PROPERTIES', "N", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'SERVICES_VIEW', "LANDING", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'SERVICES_CATALOG_DEFAULT_VIEW', "TILE", true);
    	UniMagazinLite::setOption(WIZARD_SITE_ID, 'SERVICES_SECTION_DEFAULT_VIEW', "tile", true);
    }
?>