<script type="text/javascript">
	function DefaultReview(object)
	{
		this.element = object['ELEMENT'];
		this.object = object;
		this.sended = false;
		
		this.constructor.prototype.formShow = function (callback) {
			$(this.element).find('#form').show();
			
			if (callback !== undefined) {
				callback();
			}
		}
		
		this.constructor.prototype.formHide = function (callback) {
			$(this.element).find('#form').hide();
			
			if (callback !== undefined) {
				callback();
			}
		}
		
		if (this.object['PARAMETERS']['FILTER_FIELDS'] == true)
		{
			$(this.element).find('#name, #description').focusout(function(){
				if ($(this).val().length == 0) {
					$(this).addClass('ui-state-error');
				} else {
					$(this).removeClass('ui-state-error');
				}
			});
		}
		
		this.constructor.prototype.Send = function (callback) {
			if (this.sended == false) {
				var name = $(this.element).find('#name').val();
				var description = $(this.element).find('#description').val();
				
				if (name.length > 0 && description.length > 0) {
					var element = this.object['PARAMETERS']['ELEMENT_ID'];
					var iblock = this.object['PARAMETERS']['IBLOCK_ID'];
					var charset = this.object['PARAMETERS']['CHARSET'];
					var url = '<?=SITE_TEMPLATE_PATH.'/components/intec/reviews/reviews/ajax/add_review.php'?>';
					
					$.ajax({
						'url': url,
						'type': 'POST',
						'data': {
							'element':element,
							'iblock':iblock,
							'charset':charset,
							'name':name,
							'description':description
						},
						'success': function(){
							if (callback !== undefined) {
								callback();
							}
							
							this.sended = true;
						}
					});
				}
			}
		}
	}
</script>