function UniSlider(parameters)
{
	if (parameters === undefined) parameters = {};
	if (parameters['slider'] === undefined) parameters['slider'] = '.uni-slider';
	if (parameters['slide'] === undefined) parameters['slide'] = '.uni-slide';
	if (parameters['display'] === undefined) parameters['display'] = 4;
	if (parameters['sizes'] === undefined) parameters['sizes'] = [];
	if (parameters['grid'] === undefined) parameters['grid'] = [
		{value: 1, size: '100%'},
		{value: 2, size: '50%'},
		{value: 3, size: '33.333333%'},
		{value: 4, size: '25%'},
		{value: 5, size: '20%'}
	];
	
	var root = $(parameters['slider']);
	var current = 0;
	var display = parameters['display'];
	
	this.constructor.prototype.scroll = function (direction) {
		if (direction != 'right') {
			direction = 'left';
		}
		
		if (direction == 'right') {
			if ((current + display) < getSlidesCount()) { current++; }
		} else {
			if ((current) > 0) { current--; }
		}
		
		update();
	}
				
	this.constructor.prototype.scrollToLeft = function () {
		this.scroll('left');
	}
	
	this.constructor.prototype.scrollToRight = function () {
		this.scroll('right');
	}
	
	function update() {
		var scrollSize = getSlideWidth() * current;
		root.stop().animate({scrollLeft:scrollSize}, 500);
	}
	
	function getSlideWidth() {
		return parseFloat(root.find(parameters['slide']).outerWidth(true));
	}
	
	function getSlidesCount() {
		return parseInt(root.find(parameters['slide']).size());
	}
	
	function getSlides() {
		return root.find(parameters['slide']);
	}
	
	function changeSize(currentSize) {
		display = parameters['display'];
		
		for (var i = 0; i < parameters['sizes'].length; i++) {
			if (parameters['sizes'][i]['size'] >= currentSize) {
				display = parameters['sizes'][i]['display'];
			}
		}
		
		for (var i = 0; i < parameters['grid'].length; i++) {
			if (parameters['grid'][i]['value'] == display) {
				getSlides().css('width', parameters['grid'][i]['size']);
			}
		}
		
		update();
	}
	
	changeSize($(window).width());
	
	$(window).resize(function(){
		changeSize($(this).width());
	})
}