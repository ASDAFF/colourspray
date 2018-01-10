<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    $this->setFrameMode(true);
    
	$cart_price = 0;
	$cart_quantity = 0;
	if (is_set($arResult["ITEMS"])){
		foreach ($arResult["ITEMS"] as $v) {
			if ($v["DELAY"]=="N" && $v["CAN_BUY"]=="Y") {
				$cart_price = $cart_price + (float)$v["PRICE"]*(int)$v["QUANTITY"];
				$cart_quantity = $cart_quantity  + (int)$v["QUANTITY"];
			}
			$valuta=$v["CURRENCY"];
		}		
	}
	if(CModule::IncludeModule("currency")){  
		if(empty($valuta)){
			$valuta="RUB";
		}
		$cur=CCurrencyLang::GetCurrencyFormat($valuta,LANGUAGE_ID);
		$cur=$cur["FORMAT_STRING"];		
	}
	$cart_price = number_format($cart_price, 0, ",", " ")." ".substr($cur,2);
	$url=$arParams["PATH_TO_BASKET"];
	// $rsBasket = CSaleBasket::GetList(
		// array(
			// "NAME" => "ASC",
			// "ID" => "ASC"
		// ),
		// array(
			// "FUSER_ID" => CSaleBasket::GetBasketUserID(),
			// "LID" => SITE_ID,
			// "ORDER_ID" => "NULL"
		// ),
		// false,
		// false,
		// array("ID", "PRODUCT_ID", "DELAY")
	// );
// while($arBasket = $rsBasket->GetNext()){
	// if( $arBasket["DELAY"] == "Y" ){
		// $delay_items[] = $arBasket["PRODUCT_ID"];
	// }else{
		// $basket_items[] = $arBasket["PRODUCT_ID"];
	// }
// }
$count_delay = 0;
$count_basket_items = 0;
if(!empty($arResult["ITEMS"])){
	foreach($arResult["ITEMS"] as $key => $arItem){
		if($arItem["DELAY"] == "Y") {
			$count_delay++;
		} else {
			$count_basket_items++;
		}
	}
}?>
<!--small_top_basket_js-->
<!--noindex-->
<?if($arParams["TYPE_BASKET"] == "fly") { ?>
	<script type="text/javascript">
		function UNIInputNumeric()
		{
			this.value = 1;
			this.minimum = 1;
			this.ratio = 1;
			this.maximum = 1;
			this.unlimited = true;
			
			this.eventNode = $({});
			
			this.on = function () {
				this.eventNode.on.apply(this.eventNode, arguments);
			}	
			
			this.trigger = function () {
				this.eventNode.trigger.apply(this.eventNode, arguments);
			}
			
			this.constructor.prototype.increase = function () {
				if (this.value + this.ratio <= this.maximum || this.unlimited == true) this.value = this.value + this.ratio;
				this.trigger('onValueChange', {value:this.value});
			}
			
			this.constructor.prototype.decrease = function () {
				if (this.value - this.ratio >= this.minimum) this.value = this.value - this.ratio;
				this.trigger('onValueChange', {value:this.value});
			}
			
			this.constructor.prototype.set = function (value) {
				var value = parseInt(value);
				
				if (isNaN(value) || value < this.minimum)
				{
					this.value = this.minimum;
					this.trigger('onValueChange', {value:this.value});
					return false;
				}
				else if (value > this.maximum && this.unlimited == false)
				{
					this.value = this.maximum;
					this.trigger('onValueChange', {value:this.value});
					return false;
				}
				else
				{
					if ((value % this.ratio) == 0)
					{
						this.value = value;
						this.trigger('onValueChange', {value:this.value});
						return true;
					}
					else
					{
						this.value = (value - (value % this.ratio));
						this.trigger('onValueChange', {value:this.value});
						return false;
					}
				}
			}
			
			this.constructor.prototype.setControls = function(selector){
				var currentClass = this;
				this.selectors = selector;
				$(selector).keypress(function(e){
					if(48 <= e.which && e.which <= 57) {
						return true;
					} 
					return false;
				}).change(function(){
					currentClass.set($(this).val());
				})
			}
		}
	</script>
    <?$frame = $this->createFrame()->begin()?>
    	<div class="basket-small hidden-part<?=!empty($arParams['TYPE_BASKET'])?' '.$arParams['TYPE_BASKET']:''?>" id="small_top_basket_js">
		<div class="icons">		
			<?if($arParams["SHOW_DELAY"] == "Y") { ?>
				<a href="<?=$url?>?delay=y" class="like" title="<?=GetMessage("TITLE_LIKEBASKET_TOP")?>">	
					<?if ($count_delay > 0):?>
						<div class="text-wrapper solid_element">
							<div class="uni-aligner-vertical"></div>
							<div class="text">
								<?=$count_delay?>
							</div>
						</div>
					<?endif;?>
					<div class="icon"></div>
				</a>
			<?}?>
			<a href="<?=$url?>" class="basket clearfix" title="<?=GetMessage("TITLE_BASKET_TOP")?>">
					<?if ($count_basket_items > 0):?>
						<div class="text-wrapper solid_element">
							<div class="uni-aligner-vertical"></div>
							<div class="text">
								<?=$count_basket_items?>
							</div>
						</div>
					<?endif;?>
				    <div class="icon"></div>
                    <div class="text summ">
                        <?=$cart_price?>
                    </div>
			</a>			
		</div>
	</div>
    	<div class="basket-small-fly">
    		<div class="header">
				<a class="basket opener" onclick="return uniFlyBasket.switchSectionByID('product-section');" title="<?=GetMessage("TITLE_BASKET_TOP")?>">
					<?if ($count_basket_items > 0):?><div class="text solid_text"><?=$count_basket_items?></div><?endif;?>	
					<div class="icon"></div>
				</a>
    			<?if($arParams["SHOW_DELAY"] == "Y") { ?>
					<a class="like opener" onclick="return uniFlyBasket.switchSectionByID('like-section');" title="<?=GetMessage("TITLE_LIKEBASKET_TOP")?>">	
						<?if ($count_delay > 0):?><div class="text solid_text"><?=$count_delay?></div><?endif;?>
						<div class="icon"></div>
					</a>
    			<? } ?>
                <?if ($arParams['SHOW_CALL'] == "Y"):?>
                    <a class="call opener" onclick="return uniFlyBasket.switchSectionByID('call-section');" title="<?=GetMessage("TITLE_ORDERCALL_TOP")?>">
    					<div class="icon"></div>
    				</a>
                <?endif;?>
    		</div>
    		<div class="sections">
    			<div class="section product_section" id="product-section">
					<?if ($count_basket_items > 0):?>
						<div class="header solid_text">
							<?=GetMessage('BASKET_FLY_GOODS_IN_CART')?> <span class="count"><?=$count_basket_items?></span> - <span class="all_summ"><?=$cart_price?></span>
						</div>
						<div class="products-wrapper">
							<table class="products">
								<tr class="product-header">
									<td></td>
									<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_NAME')?></div></td>
									<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_QUANTITY')?></div></td>
									<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_PRICE')?></div></td>
									<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_ALL_PRICE')?></div></td>
									<td></td>
									<td></td>
								</tr>
								<? foreach ($arResult['ITEMS'] as $arItem) { ?>
									<? if ($arItem['DELAY'] == 'N') { ?>
										<? 
											if (!empty($arItem['PREVIEW_PICTURE'])) {
												$picture = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => '63', 'height' => '63'), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
											} else if (!empty($arItem['DETAIL_PICTURE'])) {
												$picture = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array('width' => '63', 'height' => '63'), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
											} else {
												$picture = array();
												$picture['src'] = SITE_TEMPLATE_PATH.'/images/noimg/no-img.png';
											}
										?>
										<tr class="product">
											<td>
												<div class="uni-image image" style="margin-left: 30px; margin-right: 20px;">
													<div class="uni-aligner-vertical"></div>
													<img src='<?=$picture['src']?>' />
												</div>
											</td>
											<td>
												<a class="name hover_link margins" style="width: 170px;" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
											</td>
											<td>
												<div class="uni-input-numeric margins" style="width: 106px;">
													<button class="decrease" onClick="return flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.decrease()">-</button>
													<input type="text" id="flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>_quantity" onChange="return flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.set(parseInt($(this).val()))" value="<?=number_format($arItem['QUANTITY'], 0, ',', ' ')?>" />
													<button class="increase" onClick="return flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.increase()">+</button>
												</div>
												<script type="text/javascript">
													var flyBasketNumeric_<?=$arItem['PRODUCT_ID']?> = new UNIInputNumeric();
													flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.value = <?=number_format($arItem['QUANTITY'], 0, ',', ' ')?>;
													flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.minimum = <?=$arItem['PRODUCT']['MEASURE_RATIO']?>;
													flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.ratio = <?=$arItem['PRODUCT']['MEASURE_RATIO']?>;
													flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.maximum = <?=$arItem['PRODUCT']['QUANTITY']?>;
													<?if ($arItem['PRODUCT']['CAN_BUY_ZERO'] == "Y" || $arItem['PRODUCT']['QUANTITY_TRACE'] == "N"):?>
														flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.unlimited = true;
													<?endif;?>
													flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.on('onValueChange', function(event, data) {
														$('#flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>_quantity').val(data.value);
														
														var summField = $('#summ_<?=$arItem['PRODUCT_ID']?>');
														var quantityField = $('#quantity_<?=$arItem['PRODUCT_ID']?>');
														var summAllField = $('.all_summ');
														var price = parseInt($('#price_<?=$arItem['PRODUCT_ID']?>').val());
														var currency = $('#currency_<?=$arItem['PRODUCT_ID']?>').val();
														
														quantityField.val(data.value);
														
														summField.html(GetFormatedPrice(price * data.value, currency));
														summAllField.html(GetFormatedPrice(Recount(), currency));
														
														fly_basket_change_count(<?=$arItem['PRODUCT_ID']?>, data.value, function(value){
															flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>.value = parseInt(value);
															$('#flyBasketNumeric_<?=$arItem['PRODUCT_ID']?>_quantity').val(value);
															quantityField.val(value);
															summField.html(GetFormatedPrice(price * value, currency));
															summAllField.html(GetFormatedPrice(Recount(), currency));
														});
														
														function GetFormatedPrice(price, currency)
														{
															return number_format(price, 0, '.', ' ') + currency;
														}
														
														function Recount()
														{
															var priceAll = 0;
															
															$('input[name=price]').each(function(){
																priceAll = priceAll + (parseInt($(this).val()) * parseInt($(this).parent().find('input[name=quantity]').val()));
															});
															
															return priceAll;
														}
													});
												</script>
											</td>
											<td>
												<div class="price margins" style="width: 99px;"><?=$arItem['PRICE_FORMATED']?></div>
											</td>
											<td>
												<div class="price margins" name="summ" id="summ_<?=$arItem['PRODUCT_ID']?>" style="width: 99px;"><?=CurrencyFormat($arItem['PRICE'] * $arItem['QUANTITY'], $arItem['CURRENCY'])?></div>
												<input type="hidden" name="quantity" id="quantity_<?=$arItem['PRODUCT_ID']?>" value="<?=number_format($arItem['QUANTITY'], 0, '.', '')?>"></input>
												<input type="hidden" name="currency" id="currency_<?=$arItem['PRODUCT_ID']?>" value="<?$currency = CCurrency::GetList($by=$arItem['CURRENCY'], $order='ask')->GetNext(); echo str_replace('#', '', $currency['FORMAT_STRING'])?>"></input>
												<input type="hidden" name="price" id="price_<?=$arItem['PRODUCT_ID']?>" value="<?=number_format($arItem['PRICE'], 0, '.', '')?>"></input>
											</td>
											<td>
												<div
													class="min-button-custom like margins"
													onclick="return fly_basket_move_to_like('<?=$arItem['PRODUCT_ID']?>', <?=number_format($arItem['QUANTITY'], 0, '.', '')?>);"
												></div>
											</td>
											<td>
												<div
													class="min-button-custom delete margins"
													style="margin-right: 30px;"
													onclick="return fly_basket_delete_product('<?=$arItem['PRODUCT_ID']?>');"
												></div>
											</td>
										</tr>
									<? } ?>
								<? } ?>
							</table>
						</div>
						<div class="buttons">
							<div class="uni-button uni-button-gray button" onclick="return uniFlyBasket.closeSections()">
								<?=GetMessage('BASKET_FLY_GO_BUY')?>
							</div>
							<div class="right">
								<a class="uni-button uni-button-gray button" href="<?=$url?>" style="margin-right: 30px;">
									<?=GetMessage('BASKET_FLY_TO_BASKET')?>
								</a>
								<a class="uni-button solid_button button" href="<?=$arParams['PATH_TO_ORDER']?>">
									<?=GetMessage('BASKET_FLY_ORDER')?>
								</a>
							</div>
							<div class="clear"></div>
						</div>
					<?else:?>
						<div class="message cart-empty">
							<div class="text"><?=GetMessage('BASKET_FLY_EMPTY_CART')?></div>
							<div class="buttons">
								<a class="uni-button uni-button-gray button" href="<?=SITE_DIR?>catalog/">
									<?=GetMessage('BASKET_FLY_GO_NEW_BUY')?>
								</a>
							</div>
						</div>
					<?endif;?>
    			</div>
    			<?if($arParams["SHOW_DELAY"] == "Y") { ?>
    				<div class="section like_section" id="like-section">
						<?if ($count_delay > 0):?>
							<div class="header solid_text"><?=GetMessage('BASKET_FLY_GOODS_IN_LIKE')?> <?=$count_delay?></div>
							<div class="products-wrapper">
								<table class="products">
									<tr class="product-header">
										<td></td>
										<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_NAME')?></div></td>
										<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_QUANTITY')?></div></td>
										<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_PRICE')?></div></td>
										<td><div class="margins solid_text"><?=GetMessage('BASKET_FLY_TABLE_ALL_PRICE')?></div></td>
										<td></td>
										<td></td>
									</tr>
									<? foreach ($arResult['ITEMS'] as $arItem) { ?>
										<? if ($arItem['DELAY'] == 'Y') { ?>
											<? 
												if (!empty($arItem['PREVIEW_PICTURE'])) {
													$picture = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => '63', 'height' => '63'), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
												} else if (!empty($arItem['DETAIL_PICTURE'])) {
													$picture = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array('width' => '63', 'height' => '63'), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
												} else {
													$picture = array();
													$picture['src'] = SITE_TEMPLATE_PATH.'/images/noimg/no-img.png';
												}
											?>
											<tr class="product">
												<td>
													<div class="uni-image image" style="margin-left: 30px; margin-right: 20px;">
														<div class="uni-aligner-vertical"></div>
														<img src='<?=$picture['src']?>' />
													</div>
												</td>
												<td>
													<a class="name hover_link margins" style="width: 170px;" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
												</td>
												<td>
													<div class="margins" style="width: 106px;">
														<?=number_format($arItem['QUANTITY'], 0, ',', ' ')?>
													</div>
												</td>
												<td>
													<div class="price margins" style="width: 99px;"><?=$arItem['PRICE_FORMATED']?></div>
												</td>
												<td>
													<div class="price margins" style="width: 99px;"><?=CurrencyFormat($arItem['PRICE'] * $arItem['QUANTITY'], $arItem['CURRENCY'])?></div>
												</td>
												<td>
													<div
														class="min-button-custom to-cart margins"
														onclick="return fly_basket_move_to_cart('<?=$arItem['PRODUCT_ID']?>', <?=number_format($arItem['QUANTITY'], 0, '.', '')?>);"
													></div>
												</td>
												<td>
													<div
														class="min-button-custom delete margins"
														onclick="return fly_basket_delete_like('<?=$arItem['PRODUCT_ID']?>');"
														style="margin-right: 30px;"
													></div>
												</td>
											</tr>
										<? } ?>
									<? } ?>
								</table>
							</div>
							<div class="buttons">
								<div class="uni-button uni-button-gray button" onclick="return uniFlyBasket.closeSections()">
									<?=GetMessage('BASKET_FLY_GO_BUY')?>
								</div>
								<div class="right">
									<a class="uni-button uni-button-gray button" href="<?=$url?>?delay=y">
										<?=GetMessage('BASKET_FLY_TO_BASKET')?>
									</a>
								</div>
							</div>
						<?else:?>
							<div class="message cart-empty">
								<div class="text"><?=GetMessage('BASKET_FLY_EMPTY_LIKE')?></div>
								<div class="buttons">
									<div class="uni-button uni-button-gray button" onclick="return uniFlyBasket.closeSections()">
										<?=GetMessage('BASKET_FLY_CLOSE')?>
									</div>
								</div>
							</div>
						<?endif;?>
    				</div>
    			<? } ?>
                <?if ($arParams['SHOW_CALL'] == "Y"):?>
                    <div class="section" id="call-section">
                       <?$APPLICATION->IncludeComponent(
                        	"bitrix:form.result.new",
                        	"shop",
                        	Array(
                        		"AJAX_MODE" => "N",
                        		"SEF_MODE" => "N",
                        		"WEB_FORM_ID" => "#CALL_FORM_ID#",
                        		"RESULT_ID" => $_REQUEST["RESULT_ID"],
                        		"START_PAGE" => "new",
                        		"SHOW_LIST_PAGE" => "N",
                        		"SHOW_EDIT_PAGE" => "N",
                        		"SHOW_VIEW_PAGE" => "N",
                        		"SUCCESS_URL" => "",
                        		"SHOW_ANSWER_VALUE" => "N",
                        		"SHOW_ADDITIONAL" => "N",
                        		"SHOW_STATUS" => "Y",
                        		"EDIT_ADDITIONAL" => "N",
                        		"EDIT_STATUS" => "N",
                        		"NOT_SHOW_FILTER" => array(),
                        		"NOT_SHOW_TABLE" => array(),
                        		"CHAIN_ITEM_TEXT" => "",
                        		"CHAIN_ITEM_LINK" => "",
                        		"IGNORE_CUSTOM_TEMPLATE" => "N",
                        		"USE_EXTENDED_ERRORS" => "Y",
                        		"CACHE_TYPE" => "A",
                        		"CACHE_TIME" => "3600",
                        		"AJAX_MODE" => "N",  // режим AJAX
                        		"AJAX_OPTION_SHADOW" => "N", // затемнять область
                        		"AJAX_OPTION_JUMP" => "Y", // скроллить страницу до компонента
                        		"AJAX_OPTION_STYLE" => "Y", // подключать стили
                        	)
                        );?>
						<script type="text/javascript">
							$(document).ready(function(){
								$('#call-section form .inputtext').eq(1).mask("+7 (999) 999-9999");
							})
						</script>
                    </div>
                <?endif;?>
    		</div>
    	</div>
    	<script>
            function UNIFlyBasket(parameters) {
                if (parameters === undefined) parameters = {};
                if (parameters['basket'] === undefined) parameters['basket'] = '.basket';
                if (parameters['switcher'] === undefined) parameters['switcher'] = '.switcher';
                if (parameters['sections'] === undefined) parameters['sections'] = '.sections';
                if (parameters['section'] === undefined) parameters['section'] = '.section';
                if (parameters['animationSpeed'] === undefined) parameters['animationSpeed'] = 500;
                
                var current = null;
                
                this.constructor.prototype.switchSectionByNumber = function (number, animate) {
                    if (animate === undefined) animate = true;
                    
                    if (current != number) {
                        var section = $(parameters['basket'] + ' ' + parameters['sections'] + ' ' + parameters['section']).eq(number);
                        var sectionWidth = section.width();
                        
                        $(parameters['basket'] + ' ' + parameters['sections'] + ' ' + parameters['section']).css('display', 'none');
                        section.css('display', 'block');
                        
                        if (animate) {
                            $(parameters['basket'] + ' ' + parameters['sections']).stop().animate({'width': sectionWidth + 'px'}, parameters['animationSpeed']);
                        } else {
                            $(parameters['basket'] + ' ' + parameters['sections']).css('width', sectionWidth + 'px');
                        }
                        
                        current = number;
                    } else {
                        this.closeSections(animate);
                    }
                }
                
                this.constructor.prototype.switchSectionByID = function (id, animate) {
                    if (animate === undefined) animate = true;
                    
                    this.switchSectionByNumber($(parameters['basket'] + ' ' + parameters['sections'] + ' ' + parameters['section'] + '#' + id).index(), animate);
                }
                
                this.constructor.prototype.closeSections = function (animate) {
                    if (animate === undefined) animate = true;
                    
                    if (animate) {
                        $(parameters['basket'] + ' ' + parameters['sections']).stop().animate({'width': '0px'}, parameters['animationSpeed'], function(){
                            $(parameters['basket'] + ' ' + parameters['sections'] + ' ' + parameters['section']).css('display', 'none');
                            current = null;
                        });
                    } else {
                        $(parameters['basket'] + ' ' + parameters['sections']).css('width', '0px');
                        $(parameters['basket'] + ' ' + parameters['sections'] + ' ' + parameters['section']).css('display', 'none');
                        current = null;
                    }
                }
            }
            
            var uniFlyBasket = new UNIFlyBasket({
                basket: '.basket-small-fly',
                switcher: '.opener'
            });
            
            $('.basket-small-fly .close_button').click(function(){
                uniFlyBasket.closeSections();
            });
            
            <?if ($_REQUEST['WEB_FORM_ID'] == '8'):?>
                uniFlyBasket.switchSectionByID('call-section', false);
            <?endif;?>
    	</script>
    <?$frame->end()?>
<?}else{?>
	<div class="basket-small<?=!empty($arParams['TYPE_BASKET'])?' '.$arParams['TYPE_BASKET']:''?>" id="small_top_basket_js">
		<div class="icons">		
			<?if($arParams["SHOW_DELAY"] == "Y") { ?>
				<a href="<?=$url?>?delay=y" class="like" title="<?=GetMessage("TITLE_LIKEBASKET_TOP")?>">	
					<?if ($count_delay > 0):?>
						<div class="text-wrapper solid_element">
							<div class="uni-aligner-vertical"></div>
							<div class="text">
								<?$frame = $this->createFrame()->begin()?>
									<?=$count_delay?>
								<?$frame->beginStub()?>
									0
								<?$frame->end()?>
							</div>
						</div>
					<?endif;?>
					<div class="icon"></div>
				</a>
			<?}?>
			<a href="<?=$url?>" class="basket clearfix" title="<?=GetMessage("TITLE_BASKET_TOP")?>">
				<?$frame = $this->createFrame()->begin()?>
					<?if ($count_basket_items > 0):?>
						<div class="text-wrapper solid_element">
							<div class="uni-aligner-vertical"></div>
							<div class="text">
								<?=$count_basket_items?>
							</div>
						</div>
					<?endif;?>
				    <div class="icon"></div>
                    <div class="text summ">
                        <?=$cart_price?>
                    </div>
                <?$frame->beginStub()?>
                    <div class="text-wrapper solid_element">
                        <div class="uni-aligner-vertical"></div>
                        <div class="text">
                            0
                        </div>
                    </div>	
				    <div class="icon"></div>
                    <div class="text summ">
                        <?=GetMessage('BASKET_FLY_NO_SUMM')?>
                    </div>
                <?$frame->end()?>
			</a>			
		</div>
	</div>
<?}?>
<!--/noindex-->
<!--small_top_basket_js-->	