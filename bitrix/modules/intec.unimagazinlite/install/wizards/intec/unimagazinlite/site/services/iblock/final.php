<?
    include('.utils.php');
    
    $sTemplateDirectory = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID.'_'.WIZARD_SITE_ID;
    $arVars = __getVars();
    
    if (CModule::IncludeModule('intec.startshop'))
    {
		//Создаем веб-формы
		//Задать вопрос
		$arFilter = array(
			'CODE'=> 'QUESTION_'.WIZARD_SITE_ID
		);
		$form = CStartShopForm::GetList(array(),$arFilter)->Fetch();
		
		if (!empty($form)) {
			$arVars['MACROS']['WEB_FORM_QUESTION_ID'] = $form['ID'];
		} else {
		
			$arFieldsForm = array(
				'CODE' => 'QUESTION_'.WIZARD_SITE_ID,
				'SORT' => 500,
				'USE_POST' => Y,
				'USE_CAPTCHA' => Y,
				'LANG' => Array (    
					'ru' => Array (
						'NAME' => GetMessage('WIZARD_FORM_QUESTION'),
						'BUTTON' => GetMessage('WIZARD_FORM_QUESTION'),
						'SENT' => GetMessage('WIZARD_FORM_QUESTION_SENT')
					)
				),
				'SID' => Array (
					WIZARD_SITE_ID
				)
			);
			$QUESTION = CStartShopForm::Add($arFieldsForm);
			
			if ($QUESTION) {
				$arFieldsFormProperty = array(	
					'CODE' => 'FIO',
					'FORM' => $QUESTION,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_FIO')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'PHONE',
					'FORM' => $QUESTION,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_PHONE')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'EMAIL',
					'FORM' => $QUESTION,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => 'E-mail'
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arVars['MACROS']['WEB_FORM_QUESTION_ID'] = $QUESTION;
			}
		}
		//Форма обратной связи

		$arFilter = array(
			'CODE'=> 'FEEDBACK_'.WIZARD_SITE_ID
		);
		$form = CStartShopForm::GetList(array(),$arFilter)->Fetch();
		if (!empty($form)) {
			$arVars['MACROS']['CONTACTS_FORM_ID'] = $form['ID'];
		} else {
		
			$arFieldsForm = array(
				'CODE' => 'FEEDBACK_'.WIZARD_SITE_ID,
				'SORT' => 500,
				'USE_POST' => Y,
				'USE_CAPTCHA' => N,
				'LANG' => Array (    
					'ru' => Array (
						'NAME' => GetMessage('WIZARD_FORM_FEEDBACK'),
						'BUTTON' => GetMessage('WIZARD_FORM_FEEDBACK_BUTTON'),
						'SENT' => GetMessage('WIZARD_FORM_FEEDBACK_FINAL')
					)
				),
				'SID' => Array (
					WIZARD_SITE_ID
				)
			);
			$FEEDBACK = CStartShopForm::Add($arFieldsForm);
			
			if ($FEEDBACK) {
				$arFieldsFormProperty = array(	
					'CODE' => 'NAME',
					'FORM' => $FEEDBACK,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'N',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FEEDBACK_NAME')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'Phone',
					'FORM' => $FEEDBACK,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'N',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FEEDBACK_PHONE')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'EMAIL',
					'FORM' => $FEEDBACK,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FEEDBACK_EMAIL')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				
				$arFieldsFormProperty = array(	
					'CODE' => 'MESSAGE',
					'FORM' => $FEEDBACK,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 1,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FEEDBACK_MESS')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arVars['MACROS']['CONTACTS_FORM_ID'] = $FEEDBACK;
			}
		}
		
		//
		//Заказать звонок
		$arFilter = array(
			'CODE'=> 'CALL_'.WIZARD_SITE_ID
		);
		$form = CStartShopForm::GetList(array(),$arFilter)->Fetch();
		
		if (!empty($form)) {
			$arVars['MACROS']['WEB_FORM_CALL_ID'] = $form['ID'];
		} else {
		
			$arFieldsForm = array(
				'CODE' => 'CALL_'.WIZARD_SITE_ID,
				'SORT' => 500,
				'USE_POST' => Y,
				'USE_CAPTCHA' => Y,
				'LANG' => Array (    
					'ru' => Array (
						'NAME' => GetMessage('WIZARD_FORM_ORDER_CALL'),
						'BUTTON' => GetMessage('WIZARD_FORM_ORDER_CALL'),
						'SENT' => GetMessage('WIZARD_FORM_PRODUCT_FINAL')
					)
				),
				'SID' => Array (
					WIZARD_SITE_ID
				)
			);
			$CALL = CStartShopForm::Add($arFieldsForm);
			
			if ($CALL) {
				$arFieldsFormProperty = array(	
					'CODE' => 'FIO',
					'FORM' => $CALL,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_FIO')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'PHONE',
					'FORM' => $CALL,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_PHONE')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arVars['MACROS']['WEB_FORM_CALL_ID'] = $CALL;
			}
		}
		//Отправить резюме
		$arFilter = array(
			'CODE'=> 'RESUME_'.WIZARD_SITE_ID
		);
		$form = CStartShopForm::GetList(array(),$arFilter)->Fetch();
		
		if (!empty($form)) {
			$arVars['MACROS']['WEB_FORM_RESUME_ID'] = $form['ID'];
		} else {
		
			$arFieldsForm = array(
				'CODE' => 'RESUME_'.WIZARD_SITE_ID,
				'SORT' => 500,
				'USE_POST' => Y,
				'USE_CAPTCHA' => Y,
				'LANG' => Array (    
					'ru' => Array (
						'NAME' => GetMessage('WIZARD_FORM_RESUME_NAME'),
						'BUTTON' => GetMessage('WIZARD_FORM_RESUME_NAME'),
						'SENT' => GetMessage('WIZARD_FORM_RESUME_SENT')
					)
				),
				'SID' => Array (
					WIZARD_SITE_ID
				)
			);
			$RESUME = CStartShopForm::Add($arFieldsForm);
			
			if ($RESUME) {
				$arFieldsFormProperty = array(	
					'CODE' => 'FIO',
					'FORM' => $RESUME,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_FIO')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'PHONE',
					'FORM' => $RESUME,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_PHONE')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'EMAIL',
					'FORM' => $RESUME,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => 'E-mail'
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'FEEDBACK_POST',
					'FORM' => $RESUME,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_RESUME_POST')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'TEXT',
					'FORM' => $RESUME,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_RESUME_TEXT')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arVars['MACROS']['WEB_FORM_RESUME_ID'] = $RESUME;
			}
		}
		//Заказать услугу
		$arFilter = array(
			'CODE'=> 'SERVICE_'.WIZARD_SITE_ID
		);
		$form = CStartShopForm::GetList(array(),$arFilter)->Fetch();
		
		if (!empty($form)) {
			$arVars['MACROS']['WEB_FORM_SERVICE_ID'] = $form['ID'];
		} else {
		
			$arFieldsForm = array(
				'CODE' => 'SERVICE_'.WIZARD_SITE_ID,
				'SORT' => 500,
				'USE_POST' => Y,
				'USE_CAPTCHA' => N,
				'LANG' => Array (    
					'ru' => Array (
						'NAME' => GetMessage('WIZARD_FORM_ORDER_SERVICE'),
						'BUTTON' => GetMessage('WIZARD_FORM_ORDER_SERVICE'),
						'SENT' => GetMessage('WIZARD_FORM_PRODUCT_FINAL')
					)
				),
				'SID' => Array (
					WIZARD_SITE_ID
				)
			);
			$SERVICE = CStartShopForm::Add($arFieldsForm);
			
			if ($SERVICE) {
				$arFieldsFormProperty = array(	
					'CODE' => 'FIO',
					'FORM' => $SERVICE,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_FIO')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'PHONE',
					'FORM' => $SERVICE,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_PHONE')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'EMAIL',
					'FORM' => $SERVICE,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => 'E-mail'
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arFieldsFormProperty = array(	
					'CODE' => 'FEEDBACK_SERVICE',
					'FORM' => $SERVICE,
					'SORT' => 500,
					'ACTIVE' => 'Y',
					'REQUIRED' => 'Y',
					'READONLY' => 'N',
					'TYPE' => 0,
					'LANG' => Array (
						'ru' => Array (
								'NAME' => GetMessage('WIZARD_FORM_NAME_SERVICE')
						)
					)
				);
				CStartShopFormProperty::Add($arFieldsFormProperty);
				$arVars['MACROS']['WEB_FORM_SERVICE_ID'] = $SERVICE;
			}
		}
		
		//Создаем статусы заказов
		$arFields = array(
			'CODE' => 'new',
			'SORT' => '100',
			'SID' => WIZARD_SITE_ID,
			'CAN_PAY' => 'N',
			'DEFAULT' => 'Y',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_STATUS_NEW')
				)
			)
		);
		CStartShopOrderStatus::Add($arFields);
		$arFields = array(
			'CODE' => 'accepted',
			'SORT' => '200',
			'SID' => WIZARD_SITE_ID,
			'CAN_PAY' => 'N',
			'DEFAULT' => 'N',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_STATUS_ACCEPTED')
				)
			)
		);
		CStartShopOrderStatus::Add($arFields);
		$arFields = array(
			'CODE' => 'compiled',
			'SORT' => '300',
			'SID' => WIZARD_SITE_ID,
			'CAN_PAY' => 'Y',
			'DEFAULT' => 'N',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_STATUS_COMPILED')
				)
			)
		);
		CStartShopOrderStatus::Add($arFields);
		$arFields = array(
			'CODE' => 'paid',
			'SORT' => '400',
			'SID' => WIZARD_SITE_ID,
			'CAN_PAY' => 'N',
			'DEFAULT' => 'N',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_STATUS_PAID')
				)
			)
		);
		CStartShopOrderStatus::Add($arFields);
		$arFields = array(
			'CODE' => 'shipped',
			'SORT' => '500',
			'SID' => WIZARD_SITE_ID,
			'CAN_PAY' => 'N',
			'DEFAULT' => 'N',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_STATUS_SHIPPED')
				)
			)
		);
		CStartShopOrderStatus::Add($arFields);
		//Создаем свойство заказа "Пункты самовывоза"
		$arFields = array(
			'CODE' => 'PICKUP',
			'SORT' => '100',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'L',
			'SUBTYPE' => 'IBLOCK_ELEMENT',
			'DATA' => array(
				'IBLOCK_ID' => $arVars['MACROS']['PICKUP_IBLOCK_ID']
			),
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_PICKUP')
				)
			)
		);
		$pickup_prop_ID = CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Индекс"
		$arFields = array(
			'CODE' => 'ZIP',
			'SORT' => '350',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'Y',
			'SUBTYPE' => '',
			'DATA' => '',
			'USER_FIELD' => 'PERSONAL_ZIP', 
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_ZIP')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "E-mail"
		$arFields = array(
			'CODE' => 'EMAIL',
			'SORT' => '400',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'Y',
			'SUBTYPE' => '',
			'DATA' => '',
			'USER_FIELD' => 'EMAIL', 
			'LANG' => array(
				'ru' => array(
					'NAME' => 'EMAIL'
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Фамилия"
		$arFields = array(
			'CODE' => 'LAST_NAME',
			'SORT' => '100',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'Y',
			'SUBTYPE' => '',
			'DATA' => '',
			'USER_FIELD' => 'LAST_NAME', 
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_LAST_NAME')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Имя"
		$arFields = array(
			'CODE' => 'NAME',
			'SORT' => '200',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'Y',
			'SUBTYPE' => '',
			'DATA' => '',
			'USER_FIELD' => 'NAME', 
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_NAME')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Телефон"
		$arFields = array(
			'CODE' => 'PHONE',
			'SORT' => '250',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'Y',
			'SUBTYPE' => '',
			'DATA' => '',
			'USER_FIELD' => 'PERSONAL_PHONE', 
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_PHONE')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Комментарий"
		$arFields = array(
			'CODE' => 'COMMENT',
			'SORT' => '350',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'SUBTYPE' => '',
			'DATA' => '',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_COMMENT')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Область"
		$arFields = array(
			'CODE' => 'STATE',
			'SORT' => '500',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'N',
			'SUBTYPE' => '',
			'DATA' => '',
			'USER_FIELD' => 'PERSONAL_STATE', 
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_STATE')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Город"
		$arFields = array(
			'CODE' => 'CITY',
			'SORT' => '600',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'N',
			'SUBTYPE' => '',
			'DATA' => '',
			'USER_FIELD' => 'PERSONAL_CITY', 
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_CITY')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Создаем свойство заказа "Улица"
		$arFields = array(
			'CODE' => 'STREET',
			'SORT' => '700',
			'ACTIVE' => 'Y',
			'SID' => WIZARD_SITE_ID,
			'TYPE' => 'S',
			'REQUIRED' => 'N',
			'SUBTYPE' => '',
			'DATA' => '',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PROPERTY_STREET')
				)
			)
		);
		CStartShopOrderProperty::Add($arFields);
		//Добавляем валюту
		$arFields = array(
			'CODE' => 'rub',
			'SORT' => '100',
			'ACTIVE' => 'Y',
			'BASE' => 'Y',
			'RATE' => '1',
			'RATING' => '1',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_CURRENCY_NAME')
				)
			),
			'FORMAT' => array(
				'ru' => array(
					'FORMAT' => '# '.GetMessage('WIZARD_CURRENCY_FORMAT').'.',
					'DELIMITER_DECIMAL' => '.',
					'DELIMITER_THOUSANDS' => ' ',
					'DECIMALS_COUNT' => '2',
					'DECIMALS_DISPLAY_ZERO' => 'N'
				)
			)
		);
		CStartShopCurrency::Add($arFields);
		//Добавляем способ оплаты 
		$arFields = array(
			'CODE' => 'rk',
			'SORT' => '100',
			'ACTIVE' => 'Y',
			'HANDLER' => 'robokassa',
			'CURRENCY' => 'rub',
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PAYMENT')
				)
			)
		);
		CStartShopPayment::Add($arFields);
		//Добавляем тип цен
		$arFields = array(
			'CODE' => 'BASE',
			'SORT' => '100',
			'ACTIVE' => 'Y',
			'BASE' => 'Y',
			'GROUPS' => array('2'),
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_PRICE')
				)
			)
		);
		$newTypePrice = CStartShopPrice::Add($arFields);
		//Добавляем способы доставки
		$arFields = array(
			'CODE' => 'PICKUP',
			'SORT' => '100',
			'ACTIVE' => 'Y',
			'PRICE' => 0,
			'SID' => WIZARD_SITE_ID,
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_DELIVERY_PICKUP')
				)
			),
			'PROPERTIES' => array($pickup_prop_ID)
		);
		CStartShopDelivery::Add($arFields);
		$arFields = array(
			'CODE' => 'COURIER',
			'SORT' => '200',
			'ACTIVE' => 'Y',
			'PRICE' => 500,
			'SID' => WIZARD_SITE_ID,
			'LANG' => array(
				'ru' => array(
					'NAME' => GetMessage('WIZARD_DELIVERY_COURIER')
				)
			)
		);
		CStartShopDelivery::Add($arFields);
		if (empty($newTypePrice)) {
			$res = CStartShopPrice::GetByCode('BASE')->Fetch();
			$newTypePrice = $res['ID'];
		}
		//Добавляем к свойсвам цена и валюта для цены ID нового типа цены
		if (!empty($arVars['MACROS']['CATALOG_IBLOCK_ID'])) {
			$res = CIBlockProperty::GetList(Array(), Array(
																'IBLOCK_ID'=>$arVars['MACROS']['CATALOG_IBLOCK_ID'],
																'CODE' => 'STARTSHOP_PRICE'
																)
			)->Fetch();
			$prop_cur_id = $res['ID'];
			$arFields = Array(
				'CODE'=>'STARTSHOP_PRICE_'.$newTypePrice,
			);
			$ibp = new CIBlockProperty;
			$ibp->Update($prop_cur_id, $arFields);
			
			$res = CIBlockProperty::GetList(Array(), Array(
																'IBLOCK_ID'=>$arVars['MACROS']['CATALOG_IBLOCK_ID'],
																'CODE' => 'STARTSHOP_CURRENCY'
																)
			)->Fetch();
			$prop_cur_id = $res['ID'];
			$arFields = Array(
				'CODE'=>'STARTSHOP_CURRENCY_'.$newTypePrice,
			);
			$ibp = new CIBlockProperty;
			$ibp->Update($prop_cur_id, $arFields);
			
		}
		if (!empty($arVars['MACROS']['OFFERS_IBLOCK_ID'])) {
			$res = CIBlockProperty::GetList(Array(), Array(
																'IBLOCK_ID'=>$arVars['MACROS']['OFFERS_IBLOCK_ID'],
																'CODE' => 'STARTSHOP_PRICE'
																)
			)->Fetch();
			$prop_cur_id = $res['ID'];
			$arFields = Array(
				'CODE'=>'STARTSHOP_PRICE_'.$newTypePrice,
			);
			$ibp = new CIBlockProperty;
			$ibp->Update($prop_cur_id, $arFields);
			
			$res = CIBlockProperty::GetList(Array(), Array(
																'IBLOCK_ID'=>$arVars['MACROS']['OFFERS_IBLOCK_ID'],
																'CODE' => 'STARTSHOP_CURRENCY'
																)
			)->Fetch();
			$prop_cur_id = $res['ID'];
			$arFields = Array(
				'CODE'=>'STARTSHOP_CURRENCY_'.$newTypePrice,
			);
			$ibp = new CIBlockProperty;
			$ibp->Update($prop_cur_id, $arFields);
			
		}
		//
		
		if (!empty($arVars['MACROS']['CATALOG_IBLOCK_ID'])) {
			if (!empty($arVars['MACROS']['OFFERS_IBLOCK_ID'])) {
				$ID_prop = array();
				$properties = CIBlockProperty::GetList(Array(), Array("IBLOCK_ID"=>$arVars['MACROS']['OFFERS_IBLOCK_ID']));
				while ($prop_fields = $properties->GetNext())
					{
						if ( $prop_fields['CODE']=='COLOR' ) $ID_prop['COLOR']=$prop_fields['ID'];
						if ( $prop_fields['CODE']=='SIZE' ) $ID_prop['SIZE']=$prop_fields['ID'];
						if ( $prop_fields['CODE']=='STARTSHOP_LINK' ) $ID_prop['STARTSHOP_LINK']=$prop_fields['ID'];
					}
				$arFields = array(
					'IBLOCK' => $arVars['MACROS']['CATALOG_IBLOCK_ID'],
					'USE_QUANTITY' => true,
					'OFFERS_IBLOCK' => $arVars['MACROS']['OFFERS_IBLOCK_ID'],
					'OFFERS_LINK_PROPERTY' => $ID_prop['STARTSHOP_LINK'],
					'OFFERS_PROPERTIES' => array($ID_prop['COLOR'],$ID_prop['SIZE'])
				);
				CStartShopCatalog::Add($arFields);
			} else {
				$arFields = array(
					'IBLOCK' => $arVars['MACROS']['CATALOG_IBLOCK_ID'],
					'USE_QUANTITY' => true,
				);
				CStartShopCatalog::Add($arFields);
			}
		}	
    }
    
    $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_ID'] = "";
    $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_CODE'] = "";
    
    if (!empty($arVars['MACROS']['CONTACTS_IBLOCK_ID']))
        if ($arIBlockElement = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $arVars['MACROS']['CONTACTS_IBLOCK_ID'], "SECTION_ID" => false))->Fetch())
        {
            $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_ID'] = $arIBlockElement['ID'];
            $arVars['MACROS']['CONTACTS_MAIN_ELEMENT_CODE'] = $arIBlockElement['CODE'];
        }
        
    if (!empty($arVars['MACROS']['CATALOG_IBLOCK_ID']))
    {
        $arLinkProperties = array(
            "CML2_BRAND" => $arVars['MACROS']['BRANDS_IBLOCK_ID'],
            "CML2_ACCESORIES" => $arVars['MACROS']['CATALOG_IBLOCK_ID'],
            "CML2_ACCOMPANYING" => $arVars['MACROS']['CATALOG_IBLOCK_ID']
        );
        
        $oCIBlockProperty = new CIBlockProperty();
        
        foreach ($arLinkProperties as $sLinkProperty => $iLinkPropertyIBlock)
            if ($arLinkProperty = CIBlockProperty::GetByID($sLinkProperty, $arVars['MACROS']['CONTACTS_IBLOCK_ID'])->Fetch())
                $oCIBlockProperty->Update($arLinkProperty['ID'], array('LINK_IBLOCK_ID' => $iLinkPropertyIBlock));
    }
        
    if (!empty($arVars['MACROS']['SERVICES_IBLOCK_ID']))
    {
        $arLinkProperties = array(
            "SPECIALIST" => $arVars['MACROS']['STAFFS_IBLOCK_ID'],
            "CHARACTERISTICS" => $arVars['MACROS']['CHARACTERISTICS_IBLOCK_ID'],
            "PROJECTS" => $arVars['MACROS']['PROJECTS_IBLOCK_ID'],
            "REVIEWS" => $arVars['MACROS']['REVIEWS_IBLOCK_ID'],
            "SERVICES" => $arVars['MACROS']['SERVICES_IBLOCK_ID'],
            "HOW_WE_WORK" => $arVars['MACROS']['TIZERS_IBLOCK_ID'],
            "VIDEO" => $arVars['MACROS']['VIDEOS_IBLOCK_ID'],
            "OUR_ADVANTAGES" => $arVars['MACROS']['TIZERS_IBLOCK_ID'],
            "OUR_CLIENTS" => $arVars['MACROS']['CLIENTS_IBLOCK_ID'],
            "CONTACTS" => $arVars['MACROS']['CONTACTS_IBLOCK_ID']
        );
        
        $oCIBlockProperty = new CIBlockProperty();
        
        foreach ($arLinkProperties as $sLinkProperty => $iLinkPropertyIBlock)
            if ($arLinkProperty = CIBlockProperty::GetByID($sLinkProperty, $arVars['MACROS']['SERVICES_IBLOCK_ID'])->Fetch())
                $oCIBlockProperty->Update($arLinkProperty['ID'], array('LINK_IBLOCK_ID' => $iLinkPropertyIBlock));
    }
    
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH, $arVars['MACROS']);
    WizardServices::ReplaceMacrosRecursive($sTemplateDirectory, $arVars['MACROS']);
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH."_index.php", $arVars['MACROS']);
	CWizardUtil::ReplaceMacros($sTemplateDirectory."/components/bitrix/breadcrumb/elegante_bread/template.php", $arVars['MACROS']);
    
    __clearVars();
?>