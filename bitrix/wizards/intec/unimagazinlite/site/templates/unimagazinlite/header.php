<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");?>
<?
    if(CModule::IncludeModule("intec.unimagazinlite")) {
		UniMagazinLite::InitProtection();
		UniMagazinLite::ShowInclude(SITE_ID);
	} else {
		die();
	}
        
    $options = UniMagazinLite::getOptionsValue(SITE_ID);
    
    $bIsFrontPage = false;
	$bShowMenuLeft = false;
    
    if (CSite::InDir(SITE_DIR.'index.php'))
		$bIsFrontPage = true;
        
    $oMenuLeft = new CMenu("left");
	$oMenuLeft->Init($APPLICATION->GetCurDir(), true);
	$bShowMenuLeft = (count($oMenuLeft->arMenu) > 0);	 	

	$oMenuTop = new CMenu("topcustom");
	$oMenuTop->Init($APPLICATION->GetCurDir(), true);
	$bShowMenuTop = (count($oMenuTop->arMenu) > 0);

    $arMenuClasses = array();
    
    if ($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == 'header') $arMenuClasses[] = 'with-menu';
    if ($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == 'header' && $options["TYPE_PHONE"]["ACTIVE_VALUE"] == 'header') $arMenuClasses[] = 'with-phone';
    if ($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == 'header' && $options["TYPE_BASKET"]["ACTIVE_VALUE"] == 'header') $arMenuClasses[] = 'with-basket';
    if ($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == 'catalog') $arMenuClasses[] = 'with-top-menu';
    
    $arMenuClasses = implode(' ', $arMenuClasses);
	
	$sFacebookContent = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_facebook.php");
	$sTwitterContent = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_twitter.php");
	$sVkontakteContent = $APPLICATION->GetFileContent($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include/socnet_vk.php");
	
	$bShowFacebook = !empty($sFacebookContent);
	$bShowTwitter = ($sTwitterContent);								
	$bShowVkontakte = (LANGUAGE_ID == 'ru' && !empty($sVkontakteContent));
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
    <head>
    	<title><?$APPLICATION->ShowTitle()?></title>
    	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />
        <?if ($options['ADAPTIV']['ACTIVE_VALUE'] == 'Y'):?>
            <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width"/>
        <?endif;?>
        
    	<?$APPLICATION->ShowHead();?>
        <?$APPLICATION->IncludeComponent(
	"intec:buttons.min.updater.lite", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
        "IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_ADD_MASK" => ".addToCompare#ID#",
		"COMPARE_ADDED_MASK" => ".removeFromCompare#ID#",
		"COMPARE_ADD_SELECTOR" => ".addToCompare",
		"COMPARE_ADDED_SELECTOR" => ".removeFromCompare",
		"BASKET_ADD_MASK" => ".addToBasket#ID#",
		"BASKET_ADDED_MASK" => ".addedToBasket#ID#",
		"BASKET_ADD_SELECTOR" => ".addToBasket",
		"BASKET_ADDED_SELECTOR" => ".addedToBasket"
	),
	false
);?>
    	<script type="text/javascript">
    		$(document).ready(function(){
    			resize();
                
    			function resize() {
    				var size = $('.bg_footer').outerHeight();
    				$('body').css('padding-bottom', (size + 50) + 'px');
    			}
                
                $(window).resize(function(){
                    resize();
                })
    		})
    	</script>
    </head>
    <body class="<?=$options['ADAPTIV']['ACTIVE_VALUE'] == 'Y'?'adaptiv':'no-adaptiv'?>">
        <?$APPLICATION->IncludeComponent(
    		"intec:panel.themeselector", 
    		".default", 
    		array(
    			"COMPONENT_TEMPLATE" => ".default"
    		),
    		$component, 
    		array('HIDE_ICONS' => 'Y')
    	);?>
        <div id="panel"><?$APPLICATION->ShowPanel();?></div>
        <div class="wrap">
        	<div class="top_panel">
        		<div class="top_panel_wrap desktop_version">	
        			<?if($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == "header"){?>
        				<div class="search_wrap">
							<?$APPLICATION->IncludeComponent(
								"bitrix:search.title", 
								"header_search",
								array(
									"NUM_CATEGORIES" => "1",
									"TOP_COUNT" => "5",
									"ORDER" => "date",
									"USE_LANGUAGE_GUESS" => "Y",
									"CHECK_DATES" => "N",
									"SHOW_OTHERS" => "N",
									"PAGE" => SITE_DIR."catalog/",
									"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
									"CATEGORY_0" => array(
									),
									"CATEGORY_0_iblock_catalog" => array(
										0 => "all",
									),
									"SHOW_INPUT" => "Y",
									"INPUT_ID" => "title-search-input",
									"CONTAINER_ID" => "search",
									"PRICE_CODE" => array(
										0 => "BASE",
									),
									"PRICE_VAT_INCLUDE" => "Y",
									"PREVIEW_TRUNCATE_LEN" => "",
									"SHOW_PREVIEW" => "Y",
									"PREVIEW_WIDTH" => "300",
									"PREVIEW_HEIGHT" => "300",
									"CONVERT_CURRENCY" => "Y",
									"CURRENCY_ID" => "",
									"COMPONENT_TEMPLATE" => "header_search"
								),
								false
							);?>
        				</div>
        			<?}?>				
        			<?if($options["TYPE_BASKET"]["ACTIVE_VALUE"] == "top") { ?>
        				<div class="basket_wrap right">
                            <div class="b_compare">
                                <?$APPLICATION->IncludeComponent(
                                	"bitrix:catalog.compare.list", 
                                	"compare.small", 
                                	array(
                                		"COMPONENT_TEMPLATE" => "top",
                                		"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
                                		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
                                		"AJAX_MODE" => "N",
                                		"AJAX_OPTION_JUMP" => "N",
                                		"AJAX_OPTION_STYLE" => "Y",
                                		"AJAX_OPTION_HISTORY" => "N",
                                		"AJAX_OPTION_ADDITIONAL" => "",
                                		"DETAIL_URL" => "",
                                		"COMPARE_URL" => SITE_DIR."catalog/compare.php",
                                		"NAME" => "CATALOG_COMPARE_LIST",
                                		"ACTION_VARIABLE" => "action",
                                		"PRODUCT_ID_VARIABLE" => "id"
                                	),
                                	false
                                );?>
                            </div>
        					<div class="b_basket">
        						<?$APPLICATION->IncludeComponent(
									"intec:startshop.basket.basket.small", 
									".default", 
									array(
										"DISPLAY_COUNT" => "Y",
										"DISPLAY_COUNT_IF_EMPTY" => "N",
										"DISPLAY_TOTAL" => "Y",
										"CURRENCY" => "rub",
										"CART_URI" => SITE_DIR."cart/",
										"COMPONENT_TEMPLATE" => ".default",
										"REQUEST_VARIABLE_ACTION" => "action",
										"REQUEST_VARIABLE_ITEM" => "item",
										"REQUEST_VARIABLE_QUANTITY" => "quantity",
										"URL_BASKET" => SITE_DIR."cart/",
										"USE_COUNT" => "N",
										"USE_COUNT_IF_EMPTY" => "N",
										"USE_SUM" => "Y"
									),
									false
								);?>
        					</div>
        				</div>
        			<?}?>
        			<div class="top_personal right">
        				<?$APPLICATION->IncludeComponent(
                        	"bitrix:system.auth.form", 
                        	"startshop", 
                        	array(
                        		"REGISTER_URL" => SITE_DIR."personal",
                        		"PROFILE_URL" => SITE_DIR."personal",
                        		"SHOW_ERRORS" => "N",
                        		"AUTH_FORGOT_PASSWORD_URL" => SITE_DIR."auth/?forgot_password=yes",
                        		"COMPONENT_TEMPLATE" => "startshop",
                        		"FORGOT_PASSWORD_URL" => SITE_DIR."personal/"
                        	),
                        	false
                        );?>
        			</div>
        			<?$ph_style="";?>
        			<?if($options["TYPE_PHONE"]["ACTIVE_VALUE"] !== 'top') {$ph_style= 'display: none';?><?}?>
        				<div class="phone_block right" style="<?=$ph_style;?>">
        					<div class="phone">
        						<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
        								"AREA_FILE_SHOW" => "file", 
        								"PATH" => SITE_DIR."include/company_phone.php", 
        							)
        						);?>
        					</div>
        					<div class="call_button">
        						<span class="open_call" onclick="openCallForm('<?=SITE_DIR?>')"><?=GetMessage("CALL_TEXT")?></span>
        					</div>
        				</div>
						
        			<?if($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == "catalog") {?>
        				<?$APPLICATION->IncludeComponent(
        					"bitrix:menu", 
        					"top_horizontal_menu", 
        					array(
        						"ROOT_MENU_TYPE" => "top",
        						"MENU_CACHE_TYPE" => "A",
        						"MENU_CACHE_TIME" => "36000000",
        						"MENU_CACHE_USE_GROUPS" => "Y",
        						"MENU_CACHE_GET_VARS" => array(
        						),
								"CACHE_SELECTED_ITEMS" => "N", // Не создавать кеш меню для каждой страницы
        						"MAX_LEVEL" => "1",
        						"CHILD_MENU_TYPE" => "",
        						"USE_EXT" => "Y",
        						"DELAY" => "N",
        						"ALLOW_MULTI_SELECT" => "N",
        						"IBLOCK_CATALOG_TYPE" => "#CATALOG_IBLOCK_TYPE#",
        						"IBLOCK_CATALOG_ID" => "#CATALOG_IBLOCK_ID#",
        						"IBLOCK_CATALOG_DIR" => SITE_DIR."catalog/",
								"IBLOCK_SERVICES_TYPE" => "#SERVICES_IBLOCK_TYPE#",
        						"IBLOCK_SERVICES_ID" => "#SERVICES_IBLOCK_ID#",
        						"IBLOCK_SERVICES_DIR" => SITE_DIR."uslugi/",
        						"TYPE_MENU" => $options["POSITION_TOP_MENU"]["ACTIVE_VALUE"],
        						"WIDTH_MENU" => $options["WIDTH_MENU"]["ACTIVE_VALUE"],
        						"COMPONENT_TEMPLATE" => "top_horizontal_menu",
        						"SMOOTH_COLUMNS" => 'Y'
        					),
        					false
        				);?>	
        				<div class="clear"></div>
        			<?}?>
        			<div class="clear"></div>
        		</div>
				<div class="top_panel_wrap mobile_version">
				<?global $USER;?>
					<div class="head_block personal<?=($USER->IsAuthorized())? '_auth':''?>_block_mob">
						<div class="wrap_icon_block"></div>
						<a href="<?=SITE_DIR?>personal/"></a>
					</div>
					<div class="head_block basket_block_mob">
						<div class="wrap_icon_block">
							<div class="b_basket_mobile">
        						<?$APPLICATION->IncludeComponent(
									"intec:startshop.basket.basket.small", 
									"mobile_header", 
									array(
										"DISPLAY_COUNT" => "Y",
										"DISPLAY_COUNT_IF_EMPTY" => "N",
										"DISPLAY_TOTAL" => "N",
										"CURRENCY" => "rub",
										"CART_URI" => SITE_DIR."cart/",
										"COMPONENT_TEMPLATE" => "mobile_header",
										"REQUEST_VARIABLE_ACTION" => "action",
										"REQUEST_VARIABLE_ITEM" => "item",
										"REQUEST_VARIABLE_QUANTITY" => "quantity",
										"URL_BASKET" => SITE_DIR."cart/",
										"USE_COUNT" => "Y",
										"USE_COUNT_IF_EMPTY" => "N",
										"USE_SUM" => "N"
									),
									false
								);?>
        					</div>
						</div>
						<a href="<?=SITE_DIR?>cart/"></a>
					</div>
					<div class="head_block compare_block_mob">
						<div class="wrap_icon_block">
							<div class="b_compare_mobile">
                                <?$APPLICATION->IncludeComponent(
                                	"bitrix:catalog.compare.list", 
                                	"mobile_header", 
                                	array(
                                		"COMPONENT_TEMPLATE" => "top",
                                		"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
										"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
                                		"AJAX_MODE" => "N",
                                		"AJAX_OPTION_JUMP" => "N",
                                		"AJAX_OPTION_STYLE" => "Y",
                                		"AJAX_OPTION_HISTORY" => "N",
                                		"AJAX_OPTION_ADDITIONAL" => "",
                                		"DETAIL_URL" => "",
                                		"COMPARE_URL" => SITE_DIR."catalog/compare.php",
                                		"NAME" => "CATALOG_COMPARE_LIST",
                                		"ACTION_VARIABLE" => "action",
                                		"PRODUCT_ID_VARIABLE" => "id"
                                	),
                                	false
                                );?>
                            </div>
						</div>
						<a href="<?=SITE_DIR?>catalog/compare.php"></a>
					</div>
					<div class="head_block phone_block_mob" onclick="openCallForm('<?=SITE_DIR?>')">
						<div class="wrap_icon_block"></div>
					</div>
				</div>
        	</div>
        	<div class="header_wrap">
        		<div class="header_wrap_information <?=($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == "header")? 'header_grey_line':''?>">
        			<table class="header_wrap_container <?=$arMenuClasses?>">
        				<tr>
        					<td class="logo_wrap">							
        						<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
        								"AREA_FILE_SHOW" => "file", 
        								"PATH" => SITE_DIR."include/logo.php", 
        							)
        						);?>
        					</td>
        					<td class="right_wrap">
        						<table class="table_wrap">
        							<tr>
        								<?if($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == "header") { ?>
        									<td style="width: 100%;">
                                                <div class="menu_wrap">
        										<?$APPLICATION->IncludeComponent(
        											"bitrix:menu", 
        											"top_horizontal_menu", 
        											array(
        												"ROOT_MENU_TYPE" => "top",
        												"MENU_CACHE_TYPE" => "A",
        												"MENU_CACHE_TIME" => "36000000",
        												"MENU_CACHE_USE_GROUPS" => "Y",
        												"MENU_CACHE_GET_VARS" => array(
        												),
														"CACHE_SELECTED_ITEMS" => "N", // Не создавать кеш меню для каждой страницы
        												"MAX_LEVEL" => "3",
        												"CHILD_MENU_TYPE" => "left",
        												"USE_EXT" => "Y",
        												"DELAY" => "N",
        												"ALLOW_MULTI_SELECT" => "N",
        												"IBLOCK_CATALOG_TYPE" => "#CATALOG_IBLOCK_TYPE#",
                                                        "IBLOCK_CATALOG_ID" => "#CATALOG_IBLOCK_ID#",
        												"IBLOCK_CATALOG_DIR" => SITE_DIR."catalog/",
														"IBLOCK_SERVICES_TYPE" => "#SERVICES_IBLOCK_TYPE#",
														"IBLOCK_SERVICES_ID" => "#SERVICES_IBLOCK_ID#",
														"IBLOCK_SERVICES_DIR" => SITE_DIR."uslugi/",
        												"MENU_IN" => "in-header",
        												"WIDTH_MENU" => $options["WIDTH_MENU"]["ACTIVE_VALUE"],
        												"COMPONENT_TEMPLATE" => "top_horizontal_menu"
        											),
        											false
        										);?>
                                                </div>
        									</td>
        								<?}?>
        								<?if($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] != "header"){?>
        									<td style="width: 100%;">
                                                <div class="search_wrap">
            										<?$APPLICATION->IncludeComponent("bitrix:search.title", "header_search", array(
            											"NUM_CATEGORIES" => "1",
            											"TOP_COUNT" => "5",
            											"ORDER" => "date",
            											"USE_LANGUAGE_GUESS" => "Y",
            											"CHECK_DATES" => "N",
            											"SHOW_OTHERS" => "N",
            											"PAGE" => SITE_DIR."catalog/",
            											"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
            											"CATEGORY_0" => array(
            											),
            											"CATEGORY_0_iblock_catalog" => array(
            												0 => "all",
            											),
            											"SHOW_INPUT" => "Y",
            											"INPUT_ID" => "title-search-input",
            											"CONTAINER_ID" => "search",
            											"PRICE_CODE" => array(
            												0 => "BASE",
            											),
            											"PRICE_VAT_INCLUDE" => "Y",
            											"PREVIEW_TRUNCATE_LEN" => "",
            											"SHOW_PREVIEW" => "Y",
            											"PREVIEW_WIDTH" => "300",
            											"PREVIEW_HEIGHT" => "300",
            											"CONVERT_CURRENCY" => "Y",
            											"CURRENCY_ID" => ""
            											),
            											false
            										);?>
                                                </div>
        									</td>
        								<?}?>
										<?if($options["TYPE_BASKET"]["ACTIVE_VALUE"] == "none" || $options["TYPE_BASKET"]["ACTIVE_VALUE"] == "fixed") {?>
											<td class="b_compare">
												<?$APPLICATION->IncludeComponent(
													"bitrix:catalog.compare.list", 
													"compare.small", 
													array(
														"COMPONENT_TEMPLATE" => "top",
														"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
                                                        "IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
														"AJAX_MODE" => "N",
														"AJAX_OPTION_JUMP" => "N",
														"AJAX_OPTION_STYLE" => "Y",
														"AJAX_OPTION_HISTORY" => "N",
														"AJAX_OPTION_ADDITIONAL" => "",
														"DETAIL_URL" => "",
														"COMPARE_URL" => SITE_DIR."catalog/compare.php",
														"NAME" => "CATALOG_COMPARE_LIST",
														"ACTION_VARIABLE" => "action",
														"PRODUCT_ID_VARIABLE" => "id",
														"TYPE" => $options["TYPE_BASKET"]["ACTIVE_VALUE"]
													),
													false
												);?>
											</td>
										<?}?>
        								<?if($options["TYPE_PHONE"]["ACTIVE_VALUE"] == 'header') {?>
        									<td class="phone_wrapper">
        										<div class="phone_wrap">
        											<div class="phone">
        												<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
        														"AREA_FILE_SHOW" => "file", 
        														"PATH" => SITE_DIR."include/company_phone.php", 
        													)
        												);?>
        											</div>
        											<div class="call_button">
        												<span class="open_call" onclick="openCallForm('<?=SITE_DIR?>')"><?=GetMessage("CALL_TEXT")?></span>
        											</div>
        										</div>
        									</td>
        								<?} else {?>
											<td class="phone_wrap_mobile">
        										<div class="phone_wrap">
        											<div class="phone">
        												<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
        														"AREA_FILE_SHOW" => "file", 
        														"PATH" => SITE_DIR."include/company_phone.php", 
        													)
        												);?>
        											</div>
        											<div class="call_button">
        												<span class="open_call" onclick="openCallForm('<?=SITE_DIR?>')"><?=GetMessage("CALL_TEXT")?></span>
        											</div>
        										</div>
        									</td>
										<?}?>
        								<?if ($options["TYPE_BASKET"]["ACTIVE_VALUE"] == "header"):?>
        									<td>
        										<div class="basket_wrap<?=$options["TYPE_BASKET"]["ACTIVE_VALUE"] == "fly"?' fly':''?>">
        											<div class="b_compare">
                                                        <?$APPLICATION->IncludeComponent(
                                                        	"bitrix:catalog.compare.list", 
                                                        	"compare.small", 
                                                        	array(
                                                        		"COMPONENT_TEMPLATE" => "top",
                                                        		"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
                                                        		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
                                                        		"AJAX_MODE" => "N",
                                                        		"AJAX_OPTION_JUMP" => "N",
                                                        		"AJAX_OPTION_STYLE" => "Y",
                                                        		"AJAX_OPTION_HISTORY" => "N",
                                                        		"AJAX_OPTION_ADDITIONAL" => "",
                                                        		"DETAIL_URL" => "",
                                                        		"COMPARE_URL" => SITE_DIR."catalog/compare.php",
                                                        		"NAME" => "CATALOG_COMPARE_LIST",
                                                        		"ACTION_VARIABLE" => "action",
                                                        		"PRODUCT_ID_VARIABLE" => "id",
                                                                "TYPE" => $options["TYPE_BASKET"]["ACTIVE_VALUE"]
                                                        	),
                                                        	false
                                                        );?>
                                                    </div>
                                                    <div class="b_basket">
        												<?$APPLICATION->IncludeComponent(
														"intec:startshop.basket.basket.small", 
														".default", 
														array(
															"DISPLAY_COUNT" => "Y",
															"DISPLAY_COUNT_IF_EMPTY" => "N",
															"DISPLAY_TOTAL" => "Y",
															"CURRENCY" => "rub",
															"CART_URI" => SITE_DIR."cart/",
															"COMPONENT_TEMPLATE" => ".default",
															"REQUEST_VARIABLE_ACTION" => "action",
															"REQUEST_VARIABLE_ITEM" => "item",
															"REQUEST_VARIABLE_QUANTITY" => "quantity",
															"USE_COUNT" => "N",
															"USE_COUNT_IF_EMPTY" => "N",
															"USE_SUM" => "Y",
															"URL_BASKET" => SITE_DIR."cart/"
														),
														false
													);?>
        											</div>
        										</div>
        									</td>
        								<?endif;?>
                                        <?if ($options["TYPE_BASKET"]["ACTIVE_VALUE"] == "fly"):?>
                                            <td>
                                                <div class="basket_wrap fly">
                                                    <div class="b_compare">
                                                        <?$APPLICATION->IncludeComponent(
                                                        	"bitrix:catalog.compare.list", 
                                                        	"compare.small", 
                                                        	array(
                                                        		"COMPONENT_TEMPLATE" => "top",
                                                        		"IBLOCK_TYPE" => "#CATALOG_IBLOCK_TYPE#",
                                                        		"IBLOCK_ID" => "#CATALOG_IBLOCK_ID#",
                                                        		"AJAX_MODE" => "N",
                                                        		"AJAX_OPTION_JUMP" => "N",
                                                        		"AJAX_OPTION_STYLE" => "Y",
                                                        		"AJAX_OPTION_HISTORY" => "N",
                                                        		"AJAX_OPTION_ADDITIONAL" => "",
                                                        		"DETAIL_URL" => "",
                                                        		"COMPARE_URL" => SITE_DIR."catalog/compare.php",
                                                        		"NAME" => "CATALOG_COMPARE_LIST",
                                                        		"ACTION_VARIABLE" => "action",
                                                        		"PRODUCT_ID_VARIABLE" => "id",
                                                                "TYPE" => $options["TYPE_BASKET"]["ACTIVE_VALUE"]
                                                        	),
                                                        	false
                                                        );?>
                                                    </div>
                                                    <div class="b_basket">
                                                       
                                                        <div class="hideable" style="white-space: normal;">
                                                            <?$APPLICATION->IncludeComponent(
																"intec:startshop.basket.basket.small", 
																".flying", 
																array(
																	"CART_URI" => SITE_DIR."cart/",
																	"COMPONENT_TEMPLATE" => ".flying",
																	"DISPLAY_GO_BUY" => "Y",
																	"CURRENCY" => "RUB",
																	"ORDER_URI" => SITE_DIR."cart/?action=order",
																	"REQUEST_VARIABLE_ACTION" => "action",
																	"REQUEST_VARIABLE_ITEM" => "item",
																	"REQUEST_VARIABLE_QUANTITY" => "quantity",
																	"USE_BUTTON_BUY" => "Y",
																	"URL_BASKET" => SITE_DIR."cart/",
																	"URL_ORDER" => "",
																	"CFO_USE_FASTORDER" => "Y",
																	"CFO_PROP_NAME" => "NAME",
																	"CFO_PROP_PHONE" => "PHONE",
																	"CFO_PROP_COMMENT" => "COMMENT"
																),
																false
															);?>
                                                        </div>
                                                    </div>    
                                                </div>
                                            </td>
                                        <?endif;?>
        							</tr>
        						</table>
        					</td>
        				</tr>
        			</table><!-- //header_wrap_container -->	
        		</div>
        		<div class="top <?=$arMenuClasses?>" style="<?=$options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] != "top"?'display: none':''?>">
        			<?$APPLICATION->IncludeComponent(
        				"bitrix:menu", 
        				"top_horizontal_menu", 
        				array(
        					"ROOT_MENU_TYPE" => "top",
        					"MENU_CACHE_TYPE" => "A",
        					"MENU_CACHE_TIME" => "36000000",
        					"MENU_CACHE_USE_GROUPS" => "Y",
        					"MENU_CACHE_GET_VARS" => array(
        					),
							"CACHE_SELECTED_ITEMS" => "N", // Не создавать кеш меню для каждой страницы
        					"MAX_LEVEL" => "3",
        					"CHILD_MENU_TYPE" => "left",
        					"USE_EXT" => "Y",
        					"DELAY" => "N",
        					"ALLOW_MULTI_SELECT" => "N",
        					"IBLOCK_CATALOG_TYPE" => "#CATALOG_IBLOCK_TYPE#",
                            "IBLOCK_CATALOG_ID" => "#CATALOG_IBLOCK_ID#",
        					"IBLOCK_CATALOG_DIR" => SITE_DIR."catalog/",
							"IBLOCK_SERVICES_TYPE" => "#SERVICES_IBLOCK_TYPE#",
							"IBLOCK_SERVICES_ID" => "#SERVICES_IBLOCK_ID#",
							"IBLOCK_SERVICES_DIR" => SITE_DIR."uslugi/",
        					"MENU_IN" => "after-header",
        					"TYPE_MENU" => $options["TYPE_TOP_MENU"]["ACTIVE_VALUE"],
        					"MENU_WIDTH_SIZE" => $options["MENU_WIDTH_SIZE"]["ACTIVE_VALUE"],
        					"SMOOTH_COLUMNS" => "Y",
        					"COMPONENT_TEMPLATE" => "top_horizontal_menu"
        				),
        				false
        			);?>
					<script>
						$(document).ready(function () {
						 $('.adaptiv .top .top_menu .parent .mobile_link').click(function(){
							if ( $(this).parent().hasClass('open') ) {
								$(this).siblings(".submenu_mobile").slideUp();
								$(this).parent().removeClass('open');
							} else {
								$(this).siblings(".submenu_mobile").slideDown();
								$(this).parent().addClass('open');
							}
							return false;
						 });
						});
					</script>
        		</div>
        		<?if($options["POSITION_TOP_MENU"]["ACTIVE_VALUE"] == "catalog"){?>
        			<?$APPLICATION->IncludeComponent("bitrix:menu", "top_catalog", Array(
        				"ROOT_MENU_TYPE" => "catalog",	
        				"MENU_CACHE_TYPE" => "A",	
        				"MENU_CACHE_TIME" => "36000000",	
        				"MENU_CACHE_USE_GROUPS" => "Y",	
        				"MENU_CACHE_GET_VARS" => "",
						"CACHE_SELECTED_ITEMS" => "N", // Не создавать кеш меню для каждой страницы
        				"MAX_LEVEL" => "3",	
        				"CHILD_MENU_TYPE" => "left",
        				"USE_EXT" => "Y",
        				"DELAY" => "N",
        				"ALLOW_MULTI_SELECT" => "N",
        				"TYPE_MENU" => $options["TYPE_TOP_MENU"]["ACTIVE_VALUE"],
        				"MENU_WIDTH_SIZE" => $options["MENU_WIDTH_SIZE"]["ACTIVE_VALUE"],
        				),
        				false
        			);?>	
        		<?}?>		
        	</div>
        	<?if($bIsFrontPage || (!$bIsFrontPage && $options["HIDE_MAIN_BANNER"]["ACTIVE_VALUE"] != "Y")){?>	
        		<?$APPLICATION->IncludeComponent(
                	"bitrix:news.list", 
                	"main_slider", 
                	array(
                		"IBLOCK_TYPE" => "#SLIDER_IBLOCK_TYPE#",
                		"IBLOCK_ID" => "#SLIDER_IBLOCK_ID#",
                		"NEWS_COUNT" => "20",
                		"SORT_BY1" => "SORT",
                		"SORT_ORDER1" => "DESC",
                		"SORT_BY2" => "SORT",
                		"SORT_ORDER2" => "ASC",
                		"FILTER_NAME" => "",
                		"FIELD_CODE" => array(
                			0 => "",
                			1 => "",
                		),
                		"PROPERTY_CODE" => array(
                			0 => "TARGET",
                			1 => "HEADER",
                			2 => "HEADER2",
                			3 => "POSITION",
                			4 => "BANNER_HREF",
                			5 => "TEXT",
                			6 => "COLOR_TEXT",
                			7 => "",
                		),
                		"CHECK_DATES" => "Y",
                		"DETAIL_URL" => "",
                		"AJAX_MODE" => "N",
                		"AJAX_OPTION_JUMP" => "N",
                		"AJAX_OPTION_STYLE" => "Y",
                		"AJAX_OPTION_HISTORY" => "N",
                		"CACHE_TYPE" => "A",
                		"CACHE_TIME" => "36000000",
                		"CACHE_FILTER" => "N",
                		"CACHE_GROUPS" => "N",
                		"PREVIEW_TRUNCATE_LEN" => "",
                		"ACTIVE_DATE_FORMAT" => "d.m.Y",
                		"SET_STATUS_404" => "N",
                		"SET_TITLE" => "N",
                		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                		"ADD_SECTIONS_CHAIN" => "N",
                		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
                		"INCLUDE_SUBSECTIONS" => "Y",
                		"PAGER_TEMPLATE" => "",
                		"DISPLAY_TOP_PAGER" => "N",
                		"DISPLAY_BOTTOM_PAGER" => "N",
                		"PAGER_SHOW_ALWAYS" => "N",
                		"PAGER_DESC_NUMBERING" => "N",
                		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                		"PAGER_SHOW_ALL" => "N",
                		"DISPLAY_DATE" => "N",
                		"DISPLAY_NAME" => "N",
                		"DISPLAY_PICTURE" => "Y",
                		"DISPLAY_PREVIEW_TEXT" => "N",
                		"AJAX_OPTION_ADDITIONAL" => "",
                		"COMPONENT_TEMPLATE" => "main_slider",
                		"SET_BROWSER_TITLE" => "Y",
                		"SET_META_KEYWORDS" => "Y",
                		"SET_META_DESCRIPTION" => "Y",
                		"SET_LAST_MODIFIED" => "N",
                		"PAGER_BASE_LINK_ENABLE" => "N",
                		"SHOW_404" => "N",
                		"MESSAGE_404" => "",
                		"PARENT_SECTION" => "",
                		"PARENT_SECTION_CODE" => "",
                		"MODE_SLIDER" => "fade",
                		"SPEED_SLIDER" => "800",
                		"USE_AUTOSCROLL" => "Y",
                		"PAUSE_AUTOSCROLL" => "8000",
						"USE_ANIMATION" => "Y"
                	),
                	false
                );?>
        	<?}?>
        	<div class="clear"></div>
        	<div class="workarea_wrap">
        		<div class="worakarea_wrap_container workarea">
        			<div class="bx_content_section">
        				<?if(!$bIsFrontPage){?>
        					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "elegante_bread", Array(
        						"START_FROM" => "0",	
        						"PATH" => "",	
        						"SITE_ID" => SITE_ID,	
        						),
        						false
        					);?> 		
        					<h1 class="header_grey"><?$APPLICATION->ShowTitle("header")?></h1>
        					<?if($bShowMenuTop){?>
        						<div class="top_custom">
        							<?$APPLICATION->IncludeComponent(
        								"bitrix:menu", 
        								"custom_menu", 
        								array(
        									"ROOT_MENU_TYPE" => "topcustom",
        									"MENU_THEME" => "site",
        									"MENU_CACHE_TYPE" => "N",
        									"MENU_CACHE_TIME" => "3600",
        									"MENU_CACHE_USE_GROUPS" => "Y",
        									"MENU_CACHE_GET_VARS" => array(
        									),
											"CACHE_SELECTED_ITEMS" => "N", // Не создавать кеш меню для каждой страницы
        									"MAX_LEVEL" => "1",
        									"CHILD_MENU_TYPE" => "left",
        									"USE_EXT" => "N",
        									"DELAY" => "N",
        									"ALLOW_MULTI_SELECT" => "N",
        									"COMPONENT_TEMPLATE" => "custom_menu",
        									"HIDE_CATALOG" => "Y",
        									"COUNT_ITEMS_CATALOG" => "8"
        								),
        								false
        							);?>
        						</div>
        					<?}?>
        					<?if($bShowMenuLeft){?>
        						<div class="left_col">
        							<?$APPLICATION->IncludeComponent(
        								"bitrix:menu", 
        								"left_menu", 
        								array(
        									"ROOT_MENU_TYPE" => "left",
        									"MENU_THEME" => "site",
        									"MENU_CACHE_TYPE" => "N",
        									"MENU_CACHE_TIME" => "3600",
        									"MENU_CACHE_USE_GROUPS" => "Y",
        									"MENU_CACHE_GET_VARS" => array(
        									),
											"CACHE_SELECTED_ITEMS" => "N", // Не создавать кеш меню для каждой страницы
        									"MAX_LEVEL" => "1",
        									"CHILD_MENU_TYPE" => "left",
        									"USE_EXT" => "N",
        									"DELAY" => "N",
        									"ALLOW_MULTI_SELECT" => "N",
        									"COMPONENT_TEMPLATE" => "left_menu",
        									"HIDE_CATALOG" => "Y",
        									"COUNT_ITEMS_CATALOG" => "8"
        								),
        								false
        							);?>
        						</div>
        						<div class="right_col">
        					<?}?>
        				<?}?>