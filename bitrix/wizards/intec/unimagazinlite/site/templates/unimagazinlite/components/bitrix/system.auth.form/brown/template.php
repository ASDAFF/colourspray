<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?CJSCore::Init(array("popup"));?>
<div class="bx_auth clearfix">
	<?if ($arResult["FORM_TYPE"] == "login"){ ?>
		<a class="personal_cabinet hover_link" href="javascript:void(0)" onclick="openAuthorizePopup()"><?=GetMessage("PERSONAL_CABINET")?></a>
	<?} else {
		$name = trim($USER->GetFullName());
		if (strlen($name) <= 0) {
			$name = $USER->GetLogin();
		}?>
		<a class="login" href="<?=$arResult['PROFILE_URL']?>"><?=htmlspecialcharsEx($name);?></a>
		<a class="logout" href="<?=$APPLICATION->GetCurPageParam("logout=yes", Array("logout"))?>"><?=GetMessage("AUTH_LOGOUT")?></a>
	<?}?>
</div>
<script>
	/*function openRegistrationPopup()
	{
		var authPopup = BX.PopupWindowManager.create("RegistrationPopup", null, {
			autoHide: true,
			offsetLeft: 0,
			offsetTop: 0,
			overlay : true,
			draggable: {restrict:true},
			closeByEsc: true,
			closeIcon: { right : "20px", top : "11px"},
			content: '<div style="width:330px;height:310px; text-align:center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
			events: {
				onAfterPopupShow: function()
				{
					BX.ajax.post(
							'<?=$this->GetFolder()?>/registration.php',
							{
								backurl: '<?=CUtil::JSEscape($arResult["BACKURL"])?>',
								forgotPassUrl: '<?=CUtil::JSEscape($arResult["AUTH_FORGOT_PASSWORD_URL"])?>',
								registrationUrl: '<?=CUtil::JSEscape($arResult["AUTH_REGISTER_URL"])?>',
								site_id: '<?=SITE_ID?>'
							},
							BX.delegate(function(result)
							{
								this.setContent(result);
							},
							this)
					);
				}
			}
		});
		authPopup.show();
	}*/
	function openAuthorizePopup() {
		if(window.innerWidth < 790) {
			document.location.href = "<?=SITE_DIR?>auth";
		}else{	
			var authPopup = BX.PopupWindowManager.create("AuthorizePopup", null, {
				autoHide: true,			
				offsetLeft: 0,
				offsetTop: 0,
				overlay : true,
				draggable: {restrict:true},
				closeByEsc: true,
				closeIcon: { right : "32px", top : "23px"},
				content: '<div style="width:724px;height:386px; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
				events: {
					onAfterPopupShow: function() {
						BX.ajax.post(
								'<?=$this->GetFolder()?>/ajax.php',
								{
									backurl: '<?=CUtil::JSEscape($arResult["BACKURL"])?>',
									forgotPassUrl: '<?=CUtil::JSEscape($arResult["AUTH_FORGOT_PASSWORD_URL"])?>',
									registrationUrl: '<?=$arParams["REGISTER_URL"]?>',
									site_id: '<?=SITE_ID?>'
								},
								BX.delegate(function(result)
								{
									this.setContent(result);
								},
								this)
						);
					}
				}
			});
			authPopup.show();
		}
	}
</script>