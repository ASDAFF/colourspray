
; /* Start:"a:4:{s:4:"full";s:136:"/bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/catalog.smart.filter/.default/script.min.js?151332561214356";s:6:"source";s:116:"/bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/catalog.smart.filter/.default/script.js";s:3:"min";s:120:"/bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/catalog.smart.filter/.default/script.min.js";s:3:"map";s:120:"/bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/catalog.smart.filter/.default/script.map.js";}"*/
function JCSmartFilter(t,e,i){this.ajaxURL=t;this.form=null;this.timer=null;this.cacheKey="";this.cache=[];this.viewMode=e;if(i&&i.SEF_SET_FILTER_URL){this.bindUrlToButton("set_filter",i.SEF_SET_FILTER_URL);this.sef=true}if(i&&i.SEF_DEL_FILTER_URL){this.bindUrlToButton("del_filter",i.SEF_DEL_FILTER_URL)}}JCSmartFilter.prototype.keyup=function(t){if(!!this.timer){clearTimeout(this.timer)}this.timer=setTimeout(BX.delegate(function(){this.reload(t)},this),500)};JCSmartFilter.prototype.click=function(t){if(!!this.timer){clearTimeout(this.timer)}this.timer=setTimeout(BX.delegate(function(){this.reload(t)},this),500)};JCSmartFilter.prototype.reload=function(t){if(this.cacheKey!==""){if(!!this.timer){clearTimeout(this.timer)}this.timer=setTimeout(BX.delegate(function(){this.reload(t)},this),1e3);return}this.cacheKey="|";this.position=BX.pos(t,true);this.form=BX.findParent(t,{tag:"form"});if(this.form){var e=[];e[0]={name:"ajax",value:"y"};this.gatherInputsValues(e,BX.findChildren(this.form,{tag:new RegExp("^(input|select)$","i")},true));for(var i=0;i<e.length;i++)this.cacheKey+=e[i].name+":"+e[i].value+"|";if(this.cache[this.cacheKey]){this.curFilterinput=t;this.postHandler(this.cache[this.cacheKey],true)}else{if(this.sef){var r=BX("set_filter");r.disabled=true}this.curFilterinput=t;BX.ajax.loadJSON(this.ajaxURL,this.values2post(e),BX.delegate(this.postHandler,this))}}};JCSmartFilter.prototype.updateItem=function(t,e){if(e.PROPERTY_TYPE==="N"||e.PRICE){var i=window["trackBar"+t];if(!i&&e.ENCODED_ID)i=window["trackBar"+e.ENCODED_ID];if(i&&e.VALUES){if(e.VALUES.MIN){if(e.VALUES.MIN.FILTERED_VALUE)i.setMinFilteredValue(e.VALUES.MIN.FILTERED_VALUE);else i.setMinFilteredValue(e.VALUES.MIN.VALUE)}if(e.VALUES.MAX){if(e.VALUES.MAX.FILTERED_VALUE)i.setMaxFilteredValue(e.VALUES.MAX.FILTERED_VALUE);else i.setMaxFilteredValue(e.VALUES.MAX.VALUE)}}}else if(e.VALUES){for(var r in e.VALUES){if(e.VALUES.hasOwnProperty(r)){var s=e.VALUES[r];var n=BX(s.CONTROL_ID);if(!!n){var l=document.querySelector('[data-role="label_'+s.CONTROL_ID+'"]');if(s.DISABLED){if(l)BX.addClass(l,"disabled");else BX.addClass(n.parentNode,"disabled")}else{if(l)BX.removeClass(l,"disabled");else BX.removeClass(n.parentNode,"disabled")}if(s.hasOwnProperty("ELEMENT_COUNT")){l=document.querySelector('[data-role="count_'+s.CONTROL_ID+'"]');if(l)l.innerHTML=s.ELEMENT_COUNT}}}}}};JCSmartFilter.prototype.postHandler=function(t,e){var i,r,s;var n=BX("modef");var l=BX("modef_num");if(!!t&&!!t.ITEMS){for(var a in t.ITEMS){if(t.ITEMS.hasOwnProperty(a)){this.updateItem(a,t.ITEMS[a])}}if(!!n&&!!l){l.innerHTML=t.ELEMENT_COUNT;i=BX.findChildren(n,{tag:"A"},true);if(t.FILTER_URL&&i){i[0].href=BX.util.htmlspecialcharsback(t.FILTER_URL)}if(t.FILTER_AJAX_URL&&t.COMPONENT_CONTAINER_ID){BX.unbindAll(i[0]);BX.bind(i[0],"click",function(e){r=BX.util.htmlspecialcharsback(t.FILTER_AJAX_URL);BX.ajax.insertToNode(r,t.COMPONENT_CONTAINER_ID);return BX.PreventDefault(e)})}if(t.INSTANT_RELOAD&&t.COMPONENT_CONTAINER_ID){r=BX.util.htmlspecialcharsback(t.FILTER_AJAX_URL);BX.ajax.insertToNode(r,t.COMPONENT_CONTAINER_ID)}else{if(n.style.display==="none"){n.style.display="inline-block"}if(this.viewMode=="VERTICAL"){s=BX.findChild(BX.findParent(this.curFilterinput,{"class":"bx-filter-parameters-box"}),{"class":"bx-filter-container-modef"},true,false);s.appendChild(n)}if(t.SEF_SET_FILTER_URL){this.bindUrlToButton("set_filter",t.SEF_SET_FILTER_URL)}}}}if(this.sef){var o=BX("set_filter");o.disabled=false}if(!e&&this.cacheKey!==""){this.cache[this.cacheKey]=t}this.cacheKey=""};JCSmartFilter.prototype.bindUrlToButton=function(t,e){var i=BX(t);if(i){var r=function(t,e){return function(){return e(t)}};if(i.type=="submit")i.type="button";BX.bind(i,"click",r(e,function(t){window.location.href=t;return false}))}};JCSmartFilter.prototype.gatherInputsValues=function(t,e){if(e){for(var i=0;i<e.length;i++){var r=e[i];if(r.disabled||!r.type)continue;switch(r.type.toLowerCase()){case"text":case"textarea":case"password":case"hidden":case"select-one":if(r.value.length)t[t.length]={name:r.name,value:r.value};break;case"radio":case"checkbox":if(r.checked)t[t.length]={name:r.name,value:r.value};break;case"select-multiple":for(var s=0;s<r.options.length;s++){if(r.options[s].selected)t[t.length]={name:r.name,value:r.options[s].value}}break;default:break}}}};JCSmartFilter.prototype.values2post=function(t){var e=[];var i=e;var r=0;while(r<t.length){var s=t[r].name.indexOf("[");if(s==-1){i[t[r].name]=t[r].value;i=e;r++}else{var n=t[r].name.substring(0,s);var l=t[r].name.substring(s+1);if(!i[n])i[n]=[];var a=l.indexOf("]");if(a==-1){i=e;r++}else if(a==0){i=i[n];t[r].name=""+i.length}else{i=i[n];t[r].name=l.substring(0,a)+l.substring(a+1)}}}return e};JCSmartFilter.prototype.hideFilterProps=function(t){var e=t.parentNode,i=e.querySelector("[data-role='bx_filter_block']"),r=e.querySelector("[data-role='prop_angle']");if(BX.hasClass(e,"bx-active")){new BX.easing({duration:300,start:{opacity:1,height:i.offsetHeight},finish:{opacity:0,height:0},transition:BX.easing.transitions.quart,step:function(t){i.style.opacity=t.opacity;i.style.height=t.height+"px"},complete:function(){i.setAttribute("style","");BX.removeClass(e,"bx-active")}}).animate();BX.addClass(r,"fa-angle-down");BX.removeClass(r,"fa-angle-up")}else{i.style.display="block";i.style.opacity=0;i.style.height="auto";var s=i.offsetHeight;i.style.height=0;new BX.easing({duration:300,start:{opacity:0,height:0},finish:{opacity:1,height:s},transition:BX.easing.transitions.quart,step:function(t){i.style.opacity=t.opacity;i.style.height=t.height+"px"},complete:function(){}}).animate();BX.addClass(e,"bx-active");BX.removeClass(r,"fa-angle-down");BX.addClass(r,"fa-angle-up")}};JCSmartFilter.prototype.showDropDownPopup=function(t,e){var i=t.querySelector('[data-role="dropdownContent"]');BX.PopupWindowManager.create("smartFilterDropDown"+e,t,{autoHide:true,offsetLeft:0,offsetTop:3,overlay:false,draggable:{restrict:true},closeByEsc:true,content:i}).show()};JCSmartFilter.prototype.selectDropDownItem=function(t,e){this.keyup(BX(e));var i=BX.findParent(BX(e),{className:"bx-filter-select-container"},false);var r=i.querySelector('[data-role="currentOption"]');r.innerHTML=t.innerHTML;BX.PopupWindowManager.getCurrentPopup().close()};BX.namespace("BX.Iblock.SmartFilter");BX.Iblock.SmartFilter=function(){var t=function(t){if(typeof t==="object"){this.leftSlider=BX(t.leftSlider);this.rightSlider=BX(t.rightSlider);this.tracker=BX(t.tracker);this.trackerWrap=BX(t.trackerWrap);this.minInput=BX(t.minInputId);this.maxInput=BX(t.maxInputId);this.minPrice=parseFloat(t.minPrice);this.maxPrice=parseFloat(t.maxPrice);this.curMinPrice=parseFloat(t.curMinPrice);this.curMaxPrice=parseFloat(t.curMaxPrice);this.fltMinPrice=t.fltMinPrice?parseFloat(t.fltMinPrice):parseFloat(t.curMinPrice);this.fltMaxPrice=t.fltMaxPrice?parseFloat(t.fltMaxPrice):parseFloat(t.curMaxPrice);this.precision=t.precision||0;this.priceDiff=this.maxPrice-this.minPrice;this.leftPercent=0;this.rightPercent=0;this.fltMinPercent=0;this.fltMaxPercent=0;this.colorUnavailableActive=BX(t.colorUnavailableActive);this.colorAvailableActive=BX(t.colorAvailableActive);this.colorAvailableInactive=BX(t.colorAvailableInactive);this.isTouch=false;this.init();if("ontouchstart"in document.documentElement){this.isTouch=true;BX.bind(this.leftSlider,"touchstart",BX.proxy(function(t){this.onMoveLeftSlider(t)},this));BX.bind(this.rightSlider,"touchstart",BX.proxy(function(t){this.onMoveRightSlider(t)},this))}else{BX.bind(this.leftSlider,"mousedown",BX.proxy(function(t){this.onMoveLeftSlider(t)},this));BX.bind(this.rightSlider,"mousedown",BX.proxy(function(t){this.onMoveRightSlider(t)},this))}BX.bind(this.minInput,"keyup",BX.proxy(function(t){this.onInputChange()},this));BX.bind(this.maxInput,"keyup",BX.proxy(function(t){this.onInputChange()},this))}};t.prototype.init=function(){var t;if(this.curMinPrice>this.minPrice){t=this.curMinPrice-this.minPrice;this.leftPercent=t*100/this.priceDiff;this.leftSlider.style.left=this.leftPercent+"%";this.colorUnavailableActive.style.left=this.leftPercent+"%"}this.setMinFilteredValue(this.fltMinPrice);if(this.curMaxPrice<this.maxPrice){t=this.maxPrice-this.curMaxPrice;this.rightPercent=t*100/this.priceDiff;this.rightSlider.style.right=this.rightPercent+"%";this.colorUnavailableActive.style.right=this.rightPercent+"%"}this.setMaxFilteredValue(this.fltMaxPrice)};t.prototype.setMinFilteredValue=function(t){this.fltMinPrice=parseFloat(t);if(this.fltMinPrice>=this.minPrice){var e=this.fltMinPrice-this.minPrice;this.fltMinPercent=e*100/this.priceDiff;if(this.leftPercent>this.fltMinPercent)this.colorAvailableActive.style.left=this.leftPercent+"%";else this.colorAvailableActive.style.left=this.fltMinPercent+"%";this.colorAvailableInactive.style.left=this.fltMinPercent+"%"}else{this.colorAvailableActive.style.left="0%";this.colorAvailableInactive.style.left="0%"}};t.prototype.setMaxFilteredValue=function(t){this.fltMaxPrice=parseFloat(t);if(this.fltMaxPrice<=this.maxPrice){var e=this.maxPrice-this.fltMaxPrice;this.fltMaxPercent=e*100/this.priceDiff;if(this.rightPercent>this.fltMaxPercent)this.colorAvailableActive.style.right=this.rightPercent+"%";else this.colorAvailableActive.style.right=this.fltMaxPercent+"%";this.colorAvailableInactive.style.right=this.fltMaxPercent+"%"}else{this.colorAvailableActive.style.right="0%";this.colorAvailableInactive.style.right="0%"}};t.prototype.getXCoord=function(t){var e=t.getBoundingClientRect();var i=document.body;var r=document.documentElement;var s=window.pageXOffset||r.scrollLeft||i.scrollLeft;var n=r.clientLeft||i.clientLeft||0;var l=e.left+s-n;return Math.round(l)};t.prototype.getPageX=function(t){t=t||window.event;var e=null;if(this.isTouch&&event.targetTouches[0]!=null){e=t.targetTouches[0].pageX}else if(t.pageX!=null){e=t.pageX}else if(t.clientX!=null){var i=document.documentElement;var r=document.body;e=t.clientX+(i.scrollLeft||r&&r.scrollLeft||0);e-=i.clientLeft||0}return e};t.prototype.recountMinPrice=function(){var t=this.priceDiff*this.leftPercent/100;t=(this.minPrice+t).toFixed(this.precision);if(t!=this.minPrice)this.minInput.value=t;else this.minInput.value="";smartFilter.keyup(this.minInput)};t.prototype.recountMaxPrice=function(){var t=this.priceDiff*this.rightPercent/100;t=(this.maxPrice-t).toFixed(this.precision);if(t!=this.maxPrice)this.maxInput.value=t;else this.maxInput.value="";smartFilter.keyup(this.maxInput)};t.prototype.onInputChange=function(){var t;if(this.minInput.value){var e=this.minInput.value;if(e<this.minPrice)e=this.minPrice;if(e>this.maxPrice)e=this.maxPrice;t=e-this.minPrice;this.leftPercent=t*100/this.priceDiff;this.makeLeftSliderMove(false)}if(this.maxInput.value){var i=this.maxInput.value;if(i<this.minPrice)i=this.minPrice;if(i>this.maxPrice)i=this.maxPrice;t=this.maxPrice-i;this.rightPercent=t*100/this.priceDiff;this.makeRightSliderMove(false)}};t.prototype.makeLeftSliderMove=function(t){t=t!==false;this.leftSlider.style.left=this.leftPercent+"%";this.colorUnavailableActive.style.left=this.leftPercent+"%";var e=false;if(this.leftPercent+this.rightPercent>=100){e=true;this.rightPercent=100-this.leftPercent;this.rightSlider.style.right=this.rightPercent+"%";this.colorUnavailableActive.style.right=this.rightPercent+"%"}if(this.leftPercent>=this.fltMinPercent&&this.leftPercent<=100-this.fltMaxPercent){this.colorAvailableActive.style.left=this.leftPercent+"%";if(e){this.colorAvailableActive.style.right=100-this.leftPercent+"%"}}else if(this.leftPercent<=this.fltMinPercent){this.colorAvailableActive.style.left=this.fltMinPercent+"%";if(e){this.colorAvailableActive.style.right=100-this.fltMinPercent+"%"}}else if(this.leftPercent>=this.fltMaxPercent){this.colorAvailableActive.style.left=100-this.fltMaxPercent+"%";if(e){this.colorAvailableActive.style.right=this.fltMaxPercent+"%"}}if(t){this.recountMinPrice();if(e)this.recountMaxPrice()}};t.prototype.countNewLeft=function(t){var e=this.getPageX(t);var i=this.getXCoord(this.trackerWrap);var r=this.trackerWrap.offsetWidth;var s=e-i;if(s<0)s=0;else if(s>r)s=r;return s};t.prototype.onMoveLeftSlider=function(t){if(!this.isTouch){this.leftSlider.ondragstart=function(){return false}}if(!this.isTouch){document.onmousemove=BX.proxy(function(t){this.leftPercent=this.countNewLeft(t)*100/this.trackerWrap.offsetWidth;this.makeLeftSliderMove()},this);document.onmouseup=function(){document.onmousemove=document.onmouseup=null}}else{document.ontouchmove=BX.proxy(function(t){this.leftPercent=this.countNewLeft(t)*100/this.trackerWrap.offsetWidth;this.makeLeftSliderMove()},this);document.ontouchend=function(){document.ontouchmove=document.touchend=null}}return false};t.prototype.makeRightSliderMove=function(t){t=t!==false;this.rightSlider.style.right=this.rightPercent+"%";this.colorUnavailableActive.style.right=this.rightPercent+"%";var e=false;if(this.leftPercent+this.rightPercent>=100){e=true;this.leftPercent=100-this.rightPercent;this.leftSlider.style.left=this.leftPercent+"%";this.colorUnavailableActive.style.left=this.leftPercent+"%"}if(100-this.rightPercent>=this.fltMinPercent&&this.rightPercent>=this.fltMaxPercent){this.colorAvailableActive.style.right=this.rightPercent+"%";if(e){this.colorAvailableActive.style.left=100-this.rightPercent+"%"}}else if(this.rightPercent<=this.fltMaxPercent){this.colorAvailableActive.style.right=this.fltMaxPercent+"%";if(e){this.colorAvailableActive.style.left=100-this.fltMaxPercent+"%"}}else if(100-this.rightPercent<=this.fltMinPercent){this.colorAvailableActive.style.right=100-this.fltMinPercent+"%";if(e){this.colorAvailableActive.style.left=this.fltMinPercent+"%"}}if(t){this.recountMaxPrice();if(e)this.recountMinPrice()}};t.prototype.onMoveRightSlider=function(t){if(!this.isTouch){this.rightSlider.ondragstart=function(){return false}}if(!this.isTouch){document.onmousemove=BX.proxy(function(t){this.rightPercent=100-this.countNewLeft(t)*100/this.trackerWrap.offsetWidth;this.makeRightSliderMove()},this);document.onmouseup=function(){document.onmousemove=document.onmouseup=null}}else{document.ontouchmove=BX.proxy(function(t){this.rightPercent=100-this.countNewLeft(t)*100/this.trackerWrap.offsetWidth;this.makeRightSliderMove()},this);document.ontouchend=function(){document.ontouchmove=document.ontouchend=null}}return false};return t}();
/* End */
;
; /* Start:"a:4:{s:4:"full";s:115:"/bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/menu/.default/script.js?15133256123583";s:6:"source";s:100:"/bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/menu/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
(function(window) {

	if (!window.BX || BX.CatalogVertMenu)
		return;

	BX.CatalogVertMenu = {
		items : {},
		idCnt : 1,
		currentItem : null,
		overItem : null,
		outItem : null,
		timeoutOver : null,
		timeoutOut : null,

		getItem : function(item)
		{
			if (!BX.type.isDomNode(item))
				return null;

			var id = !item.id || !BX.type.isNotEmptyString(item.id) ? (item.id = "menu-item-vert-" + this.idCnt++) : item.id;

			if (!this.items[id])
				this.items[id] = new CatalogVertMenuItem(item);

			return this.items[id];
		},

		itemOver : function(item)
		{
			var menuItem = this.getItem(item);
			if (!menuItem)
				return;

			if (this.outItem == menuItem)
			{
				clearTimeout(menuItem.timeoutOut);
			}

			this.overItem = menuItem;

			if (menuItem.timeoutOver)
			{
				clearTimeout(menuItem.timeoutOver);
			}

			menuItem.timeoutOver = setTimeout(function() {
				if (BX.CatalogVertMenu.overItem == menuItem)
				{
					menuItem.itemOver();
				}
			}, 100);
		},

		itemOut : function(item)
		{
			var menuItem = this.getItem(item);
			if (!menuItem)
				return;

			this.outItem = menuItem;

			if (menuItem.timeoutOut)
			{
				clearTimeout(menuItem.timeoutOut);
			}

			menuItem.timeoutOut = setTimeout(function() {

				if (menuItem != BX.CatalogVertMenu.overItem)
				{
					menuItem.itemOut();
				}
				if (menuItem == BX.CatalogVertMenu.outItem)
				{
					menuItem.itemOut();
				}

			}, 100);
		}
	};

	var CatalogVertMenuItem = function(item)
	{
		this.element = item;
		this.popup = BX.findChild(item, { className: "startshop-children-container" }, false, false);
	};

	CatalogVertMenuItem.prototype.itemOver = function()
	{
		if (!BX.hasClass(this.element, "hover"))
		{
			if (!this.popup)
			{
				return;
			}
			//this.alignPopup();
			BX.addClass(this.element, "hover");
		}
	};

	CatalogVertMenuItem.prototype.itemOut = function()
	{
		BX.removeClass(this.element, "hover");
	};

	CatalogVertMenuItem.prototype.alignPopup = function()
	{
		if (!this.popup)
		{
			return;
		}

//		BX.addClass(this.popup, "invisible-panel");

		var widthPopup = this.element.offsetWidth;
//		var container = BX.findParent(this.element, {className:"bx_vertical_menu_advanced"});
//		var heightPopup = this.popup.offsetHeight;
//		var heightContainer = container.offsetHeight;

		var offsetRightPopup = this.element.offsetLeft + widthPopup; //right side of container

//		if (heightPopup > heightContainer)
//		{
//			BX.adjust(this.popup, {
//				style:{
//					left:(offsetRightPopup-2)+"px",
//					top:(container.offsetTop-15)+"px"
//				}
//			});
//		}
//		else
//		{
			BX.adjust(this.popup, {
				style:{
					left:(offsetRightPopup-2)+"px",
					top: this.element.offsetTop+"px"
				}
			});
//		}
//		BX.removeClass(this.popup, "invisible-panel");
	}
})(window);

function menuVertCatalogChangeSectionPicure(element)
{
	// var curImgWrapObj = BX.nextSibling(element);
	// var curImgObj = BX.clone(BX.firstChild(curImgWrapObj));
	// var curDescr = element.getAttribute("data-description");
	// var parentObj = BX.hasClass(element, 'bx_hma_one_lvl') ? element : BX.findParent(element, {className:'bx_hma_one_lvl'});
	// var sectionImgObj = BX.findChild(parentObj, {className:'bx_section_picture'}, true, false);
	// sectionImgObj.innerHTML = "";
	// sectionImgObj.appendChild(curImgObj);
	// var sectionDescrObj = BX.findChild(parentObj, {className:'bx_section_description'}, true, false);
	// sectionDescrObj.innerHTML = curDescr;
	// BX.previousSibling(sectionDescrObj).innerHTML = element.innerHTML;
	// sectionImgObj.parentNode.href = element.href;
}
/* End */
;; /* /bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/catalog.smart.filter/.default/script.min.js?151332561214356*/
; /* /bitrix/templates/unimagazinlite_s1/components/bitrix/catalog/catalog/bitrix/menu/.default/script.js?15133256123583*/

//# sourceMappingURL=page_c81b672462d42cd0528c50751a711531.map.js