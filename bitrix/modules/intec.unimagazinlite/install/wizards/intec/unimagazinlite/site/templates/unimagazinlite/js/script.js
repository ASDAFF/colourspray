$(document).ready(function(){
	$('.fancy').fancybox();	
	$("input[name='PERSONAL_PHONE']").mask("+7 (999) 999-9999");
	$('.button_up').click(function() {
		$('body, html').animate({
			scrollTop: 0
      }, 1000);
   });
})
$(window).scroll(function(){
	var top_show = 300 ;
	if($(this).scrollTop() > top_show) {
		$('.button_up').fadeIn();
	} 
	else {
		$('.button_up').fadeOut();
	}
})

//start addToBasket
function addToBasket(sSiteDirectory ,sIBlockType, iIBlockID, CatalogBasketAction, CatalogBasketItem, CatalogBasketQuantity, CatalogBasketPrice, sCompareName, CFO_USE, CFO_NAME, CFO_PHONE, CFO_COMMENT) {
	$.post(sSiteDirectory + 'ajax/add_to_basket.php',{
		IBLOCK_TYPE: sIBlockType,
		IBLOCK_ID: iIBlockID,
		CatalogBasketAction: CatalogBasketAction,
		CatalogBasketItem: CatalogBasketItem,
		CatalogBasketQuantity: CatalogBasketQuantity,
		CatalogBasketPrice: CatalogBasketPrice,
		COMPARE_NAME: sCompareName,
		CFO_USE_FASTORDER: CFO_USE,
		CFO_PROP_NAME: CFO_NAME,
		CFO_PROP_PHONE: CFO_PHONE,
		CFO_PROP_COMMENT: CFO_COMMENT
	}).done(function (Script) {
		$('.b_basket').html(Script);
	});
	
	$.post(sSiteDirectory + 'ajax/add_to_basketMobile.php', {
		CatalogBasketAction: CatalogBasketAction,
		CatalogBasketItem: CatalogBasketItem,
		CatalogBasketQuantity: CatalogBasketQuantity,
		CatalogBasketPrice: CatalogBasketPrice,
	}).done(function (sResponse) {
		$('.b_basket_mobile').html(sResponse);
	});
}
function removeToBasket(sSiteDirectory, CatalogBasketAction, CatalogBasketItem, fly_basket_opened, CFO_USE, CFO_NAME, CFO_PHONE, CFO_COMMENT) {
	$.post(sSiteDirectory + 'ajax/add_to_basket.php',{
		CatalogBasketAction: CatalogBasketAction,
		CatalogBasketItem: CatalogBasketItem,
		fly_basket_opened: fly_basket_opened,
		CFO_USE_FASTORDER: CFO_USE,
		CFO_PROP_NAME: CFO_NAME,
		CFO_PROP_PHONE: CFO_PHONE,
		CFO_PROP_COMMENT: CFO_COMMENT
	}).done(function (Script) {
		$('.b_basket').html(Script);
	});
	$.post(sSiteDirectory + 'ajax/add_to_basketMobile.php',{
		CatalogBasketAction: CatalogBasketAction,
		CatalogBasketItem: CatalogBasketItem
	}).done(function (Script) {
		$('.b_basket_mobile').html(Script);
	});
}

function setQuantityInBasket(sSiteDirectory, CatalogBasketAction, CatalogBasketItem, CatalogBasketQuantity, fly_basket_opened, CFO_USE, CFO_NAME, CFO_PHONE, CFO_COMMENT) {
	$.post(sSiteDirectory + 'ajax/add_to_basket.php',{
		CatalogBasketAction: CatalogBasketAction,
		CatalogBasketItem: CatalogBasketItem,
		CatalogBasketQuantity: CatalogBasketQuantity,
		fly_basket_opened: fly_basket_opened,
		CFO_USE_FASTORDER: CFO_USE,
		CFO_PROP_NAME: CFO_NAME,
		CFO_PROP_PHONE: CFO_PHONE,
		CFO_PROP_COMMENT: CFO_COMMENT
	}).done(function (Script) {
		$('.b_basket').html(Script);
	});
	/* $.post(sSiteDirectory + 'ajax/add_to_basketMobile.php',{
		CatalogBasketAction: CatalogBasketAction,
		CatalogBasketItem: CatalogBasketItem,
		CatalogBasketQuantity: CatalogBasketQuantity
	}).done(function (Script) {
		$('.b_basket_mobile').html(Script);
	}); */
}
//end addToBasket

function addOneBuyClick (sSiteDirectory, sImage, sPropName, sPropPhone, sPropComment, sProductID, sProductName, sProductQuantity, sProductPrice, sProductPricePrint, sProductCurrency) {
	var oneBuyClick = BX.PopupWindowManager.create("OneBuyClick"+sProductID, null, {
		autoHide: true,			
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		draggable: {restrict:true},
		closeByEsc: true,
		closeIcon: { right : "32px", top : "23px"},
		content: '<div style="width:586px;height:435px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="/images/please_wait.gif"/></span></div>',
		events: {
			onAfterPopupShow: function()
			{
				BX.ajax.post(sSiteDirectory + 'ajax/one_click_buy.php', 
				{
					'IMAGE': sImage,
					'PROP_NAME': sPropName,
					'PROP_PHONE': sPropPhone,
					'PROP_COMMENT': sPropComment,
					'PRODUCT_ID': sProductID,
					'PRODUCT_NAME': sProductName,
					'PRODUCT_QUANTITY': sProductQuantity,
					'PRODUCT_PRICE': sProductPrice,
					'PRODUCT_PRICE_PRINT': sProductPricePrint,
					'PRODUCT_CURRENCY': sProductCurrency
				},
					BX.delegate(function(result) {
						this.setContent(result);
					}, this)
				);
			}
		},
		buttons: [
               new BX.PopupWindowButton({
                  className: "bx_popup_close" ,
                  events: {click: function(){
                     this.popupWindow.close();
                  }}
               })
        ]
	});
	oneBuyClick.show();
}

function createFastOrder (sSiteDirectory, sPropName, sPropPhone, sPropComment, sProductCurrency) {
	var fastOrder = BX.PopupWindowManager.create("fastOrder"+(+new Date), null, {
		autoHide: true,			
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		draggable: {restrict:true},
		closeByEsc: true,
		closeIcon: { right : "32px", top : "23px"},
		content: '<div style="width:300px;height:435px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="/images/please_wait.gif"/></span></div>',
		events: {
			onAfterPopupShow: function()
			{
				BX.ajax.post(sSiteDirectory + 'ajax/one_click_buy.php', 
				{
					'PROP_NAME': sPropName,
					'PROP_PHONE': sPropPhone,
					'PROP_COMMENT': sPropComment,
					'PRODUCT_CURRENCY': sProductCurrency,
					'ACTION': 'CREATE_FAST_ORDER'
				},
					BX.delegate(function(result) {
						this.setContent(result);
					}, this)
				);
			}
		},
		buttons: [
               new BX.PopupWindowButton({
                  className: "bx_popup_close" ,
                  events: {click: function(){
                     this.popupWindow.close();
                  }}
               })
        ]
	});
	fastOrder.show();
}

function addToCompare(sSiteDirectory ,sIBlockType, iIBlockID, sCompareName, sCompareLink){	

	$.ajax({
		url: sCompareLink,
		type: "GET"
	})
	.done(function () {
        $.post(sSiteDirectory + 'ajax/UpdateButtons.php',{
            IBLOCK_TYPE: sIBlockType,
			IBLOCK_ID: iIBlockID,
			COMPARE_NAME: sCompareName
        }).done(function (Script) {
            $('head').append(Script);
        });
		$.post(sSiteDirectory + 'ajax/UpdateCompare.php', {
			IBLOCK_TYPE: sIBlockType,
			IBLOCK_ID: iIBlockID,
			COMPARE_NAME: sCompareName
		}).done(function (sResponse) {
			$('.b_compare').html(sResponse);
		});
		$.post(sSiteDirectory + 'ajax/UpdateCompareMobile.php', {
			IBLOCK_TYPE: sIBlockType,
			IBLOCK_ID: iIBlockID,
			COMPARE_NAME: sCompareName
		}).done(function (sResponse) {
			$('.b_compare_mobile').html(sResponse);
		});
	});	
	return false;
}

function removeFromCompare(sSiteDirectory, sIBlockType, iIBlockID, sCompareName, sCompareLink){

	$.ajax({
		url: sCompareLink,
		type: "GET"
	})	
	.done(function () {
        $.post(sSiteDirectory + 'ajax/UpdateButtons.php',{
            IBLOCK_TYPE: sIBlockType,
			IBLOCK_ID: iIBlockID,
			COMPARE_NAME: sCompareName
        }).done(function (Script) {
            $('head').append(Script);
        });
		$.post(sSiteDirectory + 'ajax/UpdateCompare.php', {
			IBLOCK_TYPE: sIBlockType,
			IBLOCK_ID: iIBlockID,
			COMPARE_NAME: sCompareName
		}).done(function (sResponse) {
			$('.b_compare').html(sResponse);
		});
		$.post(sSiteDirectory + 'ajax/UpdateCompareMobile.php', {
			IBLOCK_TYPE: sIBlockType,
			IBLOCK_ID: iIBlockID,
			COMPARE_NAME: sCompareName
		}).done(function (sResponse) {
			$('.b_compare_mobile').html(sResponse);
		});
	})	
	return false;
}

function openCallForm(sSiteDirectory) {
	var callPopup = BX.PopupWindowManager.create("CallPopup", null, {
		autoHide: true,			
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		draggable: {restrict:true},
		closeByEsc: true,
		closeIcon: { right : "32px", top : "23px"},
		content: '<div style="width:404px;height:385px; text-align: center;"><span style="position:absolute; left:50%; top:50%; margin-left: -20px; margin-top: -20px;"><img src="/images/please_wait.gif"/></span></div>',
		events: {
			onAfterPopupShow: function()
			{
				BX.ajax.post(sSiteDirectory + 'ajax/FeedbackOrderCall.php', {},
					BX.delegate(function(result) {
						this.setContent(result);
					}, this)
				);
			}
		},
		buttons: [
               new BX.PopupWindowButton({
                  className: "bx_popup_close" ,
                  events: {click: function(){
                     this.popupWindow.close();
                  }}
               })
        ]
	});
	callPopup.show();
}

function openFaqPopup (sSiteDirectory) {
	var faqPopup = BX.PopupWindowManager.create("FaqPopup", null, {
		autoHide: true,			
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		draggable: {restrict:true},
		closeByEsc: true,
		closeIcon: { right : "32px", top : "23px"},
		content: '<div style="width:404px;height:385px; text-align: center;"><span style="position:absolute; left:50%; top:50%; margin-left: -20px; margin-top: -20px;"><img src="/images/please_wait.gif"/></span></div>',
		events: {
			onAfterPopupShow: function()
			{
				BX.ajax.post(sSiteDirectory + 'ajax/FeedbackQuestion.php', {},
					BX.delegate(function(result) {
						this.setContent(result);
					}, this)
				);
			}
		},
		buttons: [
               new BX.PopupWindowButton({
                  className: "bx_popup_close" ,
                  events: {click: function(){
                     this.popupWindow.close();
                  }}
               })
        ]
	});
	faqPopup.show();
}

function openOrderServicePopup (sSiteDirectory, sServiceName) {
    var that = this;
    if (sServiceName === undefined) sServiceName = '';
    that.sServiceName = sServiceName;
    
	var orderServicePopup = BX.PopupWindowManager.create("ServicePopup", null, {
		autoHide: true,			
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		draggable: {restrict:true},
		closeByEsc: true,
		closeIcon: { right : "32px", top : "23px"},
		content: '<div style="width:404px; height:440px; text-align:center;"><span style="position:absolute; left:50%; top:50%; margin-left: -20px; margin-top: -20px;"><img src="/images/please_wait.gif"/></span></div>',
		events: {
			onAfterPopupShow: function()
			{
				BX.ajax.post(sSiteDirectory + 'ajax/FeedbackOrderService.php', {'FEEDBACK_SERVICE': that.sServiceName},
					BX.delegate(function(result) {
						this.setContent(result);
					}, this)
				);
			}
		},
		buttons: [
               new BX.PopupWindowButton({
                  className: "bx_popup_close" ,
                  events: {click: function(){
                     this.popupWindow.close();
                  }}
               })
        ]
	});
	orderServicePopup.show();
}

function openResumePopup (sSiteDirectory, sPostName) {
    var that = this;
    if (sPostName === undefined) sPostName = '';
    that.sPostName = sPostName;
    
	var orderServicePopup = BX.PopupWindowManager.create("ResumePopup", null, {
		autoHide: true,			
		offsetLeft: 0,
		offsetTop: 0,
		overlay : true,
		draggable: {restrict:true},
		closeByEsc: true,
		closeIcon: { right : "32px", top : "23px"},
		content: '<div style="width:404px; height:575px; text-align:center;"><span style="position:absolute; left:50%; top:50%; margin-left: -20px; margin-top: -20px;"><img src="/images/please_wait.gif"/></span></div>',
		events: {
			onAfterPopupShow: function()
			{
				BX.ajax.post(sSiteDirectory + 'ajax/FeedbackResume.php', {'FEEDBACK_POST': that.sPostName},
					BX.delegate(function(result) {
						this.setContent(result);
					}, this)
				);
			}
		},
		buttons: [
               new BX.PopupWindowButton({
                  className: "bx_popup_close" ,
                  events: {click: function(){
                     this.popupWindow.close();
                  }}
               })
        ]
	});
	orderServicePopup.show();
}

function number_format( number, decimals, dec_point, thousands_sep ) {
	var i, j, kw, kd, km;

	if( isNaN(decimals = Math.abs(decimals)) ){
		decimals = 2;
	}
	if( dec_point == undefined ){
		dec_point = ",";
	}
	if( thousands_sep == undefined ){
		thousands_sep = ".";
	}

	i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

	if( (j = i.length) > 3 ){
		j = j % 3;
	} else{
		j = 0;
	}

	km = (j ? i.substr(0, j) + thousands_sep : "");
	kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
	kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");

	return km + kw + kd;
}

function UNISlider ($oSettings) {
    var that = this;
    
    this.defaults = {
        'INFINITY_SLIDE': false,
        'SLIDER': '.slider',
        'ELEMENT': '.slide',
        'CURRENT': 0,
        'OFFSET': 1,
        'CUSTOM_CHANGE_RULE': null,
        'ANIMATE': false,
        'ANIMATE_SPEED': 500,
        'EVENTS': {
            'onSlideLeft': function () {},
            'onSlideRight': function () {},
            'onSlide': function () {},
            'onAdaptabilityChange': function () {},
        },
        'ADAPTABILITY': []
    }
    
    this.Settings = $.extend({}, this.defaults, $oSettings || {});
    
    this.constructor.prototype.GetMinSlide = function () {
        return 0;
    }
    
    this.constructor.prototype.GetMaxSlide = function () {
        return this.GetElementsCount() - this.Settings.OFFSET;
    }
    
    this.constructor.prototype.GetCurrentSlide = function () {
        return this.Settings.CURRENT;
    }
    
    this.constructor.prototype.GetElements = function () {
        return $(this.Settings.ELEMENT)
    }
    
    this.constructor.prototype.GetElementsCount = function () {
        return this.GetElements().size();
    }
    
    this.constructor.prototype.GetSliderWidth = function () {
        var $oSlider = $(this.Settings.SLIDER);
        var $fWidth = 0;
        
        if ($oSlider[0] !== undefined) 
            if (__isFunction($oSlider[0].getBoundingClientRect)){
                var $oRectangle = $oSlider[0].getBoundingClientRect();
                $fWidth = parseFloat($oRectangle.right - $oRectangle.left);
            }
        
        if ($fWidth == 0)
            if ($oSlider.css('box-sizing') == 'border-box') {
                $fWidth = parseFloat($oSlider.outerWidth(false));
            } else {
                $fWidth = parseFloat($oSlider.width());
            }
            
        return $fWidth;
    }
    
    this.constructor.prototype.GetElementWidth = function () {
        var $oElements = $(this.Settings.ELEMENT);
        var $fWidth = 0;
        
        if ($oElements[0] !== undefined) 
            if (__isFunction($oElements[0].getBoundingClientRect)){
                var $oRectangle = $oElements[0].getBoundingClientRect();
                $fWidth = parseFloat($oRectangle.right - $oRectangle.left);
            }
        
        if ($fWidth == 0)
            if ($oElements.css('box-sizing') == 'border-box') {
                $fWidth = parseFloat($oElements.outerWidth(false));
            } else {
                $fWidth = parseFloat($oElements.width());
            }
            
        return $fWidth;
    }
    
    this.constructor.prototype.SlideLeft = function () {
        this.SlideTo(this.Settings.CURRENT + 1);
        
        if (__isObject(this.Settings.EVENTS))
            if (__isFunction(this.Settings.EVENTS.onSlideLeft))
                this.Settings.EVENTS.onSlideLeft(this);
    }
    
    this.constructor.prototype.SlideRight = function () {
        this.SlideTo(this.Settings.CURRENT - 1);
        
        if (__isObject(this.Settings.EVENTS))
            if (__isFunction(this.Settings.EVENTS.onSlideRight))
                this.Settings.EVENTS.onSlideRight(this);
    }
    
    this.constructor.prototype.Slide = function ($iSlideNumber) {
        this.SlideTo($iSlideNumber);
        
        if (__isObject(this.Settings.EVENTS))
            if (__isFunction(this.Settings.EVENTS.onSlide))
                this.Settings.EVENTS.onSlide(this);
    }
    
    this.constructor.prototype.SlideTo = function ($iSlideNumber) {
        var $oSettings = {};
        $oSettings.SLIDE = {};
        $oSettings.SLIDE.CURRENT = this.GetCurrentSlide();
        $oSettings.SLIDE.NEXT = parseInt($iSlideNumber);
        $oSettings.BOUNDARIES = {};
        $oSettings.BOUNDARIES.MINIMUM = this.GetMinSlide();
        $oSettings.BOUNDARIES.MAXIMUM = this.GetMaxSlide();
        $oSettings.ELEMENT = {};
        $oSettings.ELEMENT.WIDTH = this.GetElementWidth();
        $oSettings.ANIMATE = this.Settings.ANIMATE;
        $oSettings.ANIMATE_SPEED = this.Settings.ANIMATE_SPEED;
        $oSettings.INFINITY_SLIDE = this.Settings.INFINITY_SLIDE;
        
        if ($oSettings.SLIDE.NEXT > $oSettings.BOUNDARIES.MAXIMUM)
            if ($oSettings.INFINITY_SLIDE == true) {
                $oSettings.SLIDE.NEXT = $oSettings.BOUNDARIES.MINIMUM;
            } else {
                $oSettings.SLIDE.NEXT = $oSettings.BOUNDARIES.MAXIMUM;
            }
        
        if ($oSettings.SLIDE.NEXT < $oSettings.BOUNDARIES.MINIMUM)
            if ($oSettings.INFINITY_SLIDE == true) {
                $oSettings.SLIDE.NEXT = $oSettings.BOUNDARIES.MAXIMUM;
            } else {
                $oSettings.SLIDE.NEXT = $oSettings.BOUNDARIES.MINIMUM;
            }
        
        if (__isFunction(this.Settings.CUSTOM_CHANGE_RULE)) {
            this.Settings.CUSTOM_CHANGE_RULE(this, $oSettings);
        } else {
            if ($oSettings.ANIMATE == true) {
                $(this.Settings.SLIDER).stop().animate({scrollLeft:$oSettings.SLIDE.NEXT * $oSettings.ELEMENT.WIDTH}, $oSettings.ANIMATE_SPEED);
            } else {
                $(this.Settings.SLIDER).scrollLeft($oSettings.SLIDE.NEXT * $oSettings.ELEMENT.WIDTH);
            }
        }
        
        this.Settings.CURRENT = $oSettings.SLIDE.NEXT;
    }
    
    function __isFunction($oFunction) {
        return Object.prototype.toString.call($oFunction) == '[object Function]';
    }
    
    function __isArray($oArray) {
        return Object.prototype.toString.call($oArray) == '[object Array]';
    }
    
    function __isObject($oObject) {
        return Object.prototype.toString.call($oObject) == '[object Object]';
    }
    
    this.constructor.prototype.__ChangeRules = function () {
        var $iCurrentWidth = $(window).width();
        var $arRules = this.Settings.ADAPTABILITY;
        var $iRulesCount = $arRules.length;
        var $iCurrentRuleWidth = -1;
        var $oCurrentRule = {'WIDTH':'DEFAULT', 'SETTINGS':{}};
        var $bAnimate = this.Settings.ANIMATE;
        
        for (var $iRuleIndex = 0; $iRuleIndex < $iRulesCount; $iRuleIndex++) {
            if ($arRules[$iRuleIndex].WIDTH != 'DEFAULT') {
                var $iRuleWidth = parseInt($arRules[$iRuleIndex].WIDTH);
                
                if ($iRuleWidth > $iCurrentWidth && (($iRuleWidth < $iCurrentRuleWidth) || ($iCurrentRuleWidth < 0))) {
                    $iCurrentRuleWidth = $iRuleWidth;
                    $oCurrentRule = $arRules[$iRuleIndex];
                }
            } else {
                $oCurrentRule = $arRules[$iRuleIndex];
            }
        }
        
        if (__isObject($oCurrentRule.SETTINGS))    
            for (var $sSettingKey in $oCurrentRule.SETTINGS)
                this.Settings[$sSettingKey] = $oCurrentRule.SETTINGS[$sSettingKey];
                
        if (__isFunction($oCurrentRule.ACTION))
            $oCurrentRule.ACTION(this);
        
        this.Settings.ANIMATE = false;
        this.SlideTo(this.GetCurrentSlide());
        this.Settings.ANIMATE = $bAnimate;
        
        if (__isObject(this.Settings.EVENTS))
            if (__isFunction(this.Settings.EVENTS.onAdaptabilityChange))
                this.Settings.EVENTS.onAdaptabilityChange(this);
    }
    
    this.__ChangeRules();
    
    $(window).on('resize', function () {
        that.__ChangeRules();
    });
}