$(document).ready(function(){
	$('.min_menu').on('click',
		function(){
			var $oMenu = $('.after-header table.top_menu');
			$oMenu.slideToggle(400, 'swing', function () {
				if ($oMenu.css('display') == 'none')
					$oMenu.css('display', '');
			});
		}
	)
})