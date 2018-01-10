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
			$(this.element).find('#name').focusout(function(){
				if ($(this).val().length == 0) {
					$(this).addClass('ui-state-error');
				} else {
					$(this).removeClass('ui-state-error');
				}
			});
		}
		
		this.constructor.prototype.Send = function (callback) {
			if (this.sended == false) {
				var name = $(this.element).find('#name, #description').val();
				var description = $(this.element).find('#description').val();
				
				if (name.length > 0 && description.length > 0) {
					var element = encodeURIComponent(this.object['PARAMETERS']['ELEMENT_ID']);
					var iblock = encodeURIComponent(this.object['PARAMETERS']['IBLOCK_ID']);
					var charset = encodeURIComponent(this.object['PARAMETERS']['CHARSET']);
					var name = encodeURIComponent(name);
					var description = encodeURIComponent(description);
					var url = '<?='http://'.$_SERVER['HTTP_HOST'].$templateFolder.'/ajax/add_review.php'?>';
					
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