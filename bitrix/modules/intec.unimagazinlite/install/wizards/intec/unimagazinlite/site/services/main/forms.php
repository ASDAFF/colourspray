<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if (!defined("WIZARD_SITE_ID") || !defined("WIZARD_SITE_DIR") || !defined("WIZARD_ABSOLUTE_PATH") || !defined('WIZARD_SITE_PATH') || !defined('LANGUAGE_ID')) die();?>
<?
	$arEvents = array(
		"FEEDBACK_ORDER_CALL" => array(
			"LID" => "ru",
			"NAME" => GetMessage('FEEDBACK_ORDER_CALL_NAME'),
			"DESCRIPTION" => GetMessage('FEEDBACK_ORDER_CALL_DESCRIPTION'),
			"PATTERN" => array(
				"ACTIVE" => "Y",
				"EMAIL_FROM" => '#DEFAULT_EMAIL_FROM#',
				'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
				'SUBJECT' => GetMessage('FEEDBACK_ORDER_CALL_PATTERN_SUBJECT'),
				'BODY_TYPE' => 'html',
				'MESSAGE' => GetMessage('FEEDBACK_ORDER_CALL_PATTERN_MESSAGE')
			)
		),
		"FEEDBACK_ORDER_SERVICE" => array(
			"LID" => "ru",
			"NAME" => GetMessage('FEEDBACK_ORDER_SERVICE_NAME'),
			"DESCRIPTION" => GetMessage('FEEDBACK_ORDER_SERVICE_DESCRIPTION'),
			"PATTERN" => array(
				"ACTIVE" => "Y",
				"EMAIL_FROM" => '#DEFAULT_EMAIL_FROM#',
				'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
				'SUBJECT' => GetMessage('FEEDBACK_ORDER_SERVICE_PATTERN_SUBJECT'),
				'BODY_TYPE' => 'html',
				'MESSAGE' => GetMessage('FEEDBACK_ORDER_SERVICE_PATTERN_MESSAGE')
			)
		),
		"FEEDBACK_QUESTION" => array(
			"LID" => "ru",
			"NAME" => GetMessage('FEEDBACK_QUESTION_NAME'),
			"DESCRIPTION" => GetMessage('FEEDBACK_QUESTION_DESCRIPTION'),
			"PATTERN" => array(
				"ACTIVE" => "Y",
				"EMAIL_FROM" => '#DEFAULT_EMAIL_FROM#',
				'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
				'SUBJECT' => GetMessage('FEEDBACK_QUESTION_PATTERN_SUBJECT'),
				'BODY_TYPE' => 'html',
				'MESSAGE' => GetMessage('FEEDBACK_QUESTION_PATTERN_MESSAGE')
			)
		),
		"FEEDBACK_RESUME" => array(
			"LID" => "ru",
			"NAME" => GetMessage('FEEDBACK_RESUME_NAME'),
			"DESCRIPTION" => GetMessage('FEEDBACK_RESUME_DESCRIPTION'),
			"PATTERN" => array(
				"ACTIVE" => "Y",
				"EMAIL_FROM" => '#DEFAULT_EMAIL_FROM#',
				'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
				'SUBJECT' => GetMessage('FEEDBACK_RESUME_PATTERN_SUBJECT'),
				'BODY_TYPE' => 'html',
				'MESSAGE' => GetMessage('FEEDBACK_RESUME_PATTERN_MESSAGE')
			)
		)
	);
	
	$arSitesID = array();
	$rsSites = CSite::GetList($by="sort", $order="desc", Array());
	
	while($arSite = $rsSites->Fetch())
		$arSitesID[] = $arSite["ID"];
	
	foreach ($arEvents as $sKey => $arEvent) {
		$dbEventType = CEventType::GetByID($sKey, $arEvent["LID"]);
		
		if (!$dbEventType->Fetch()) {
			$arEvent['EVENT_NAME'] = $sKey;
			$arEvent['PATTERN']['EVENT_NAME'] = $sKey;
			$arEvent['PATTERN']['LID'] = $arSitesID;
			
			$arEventFields = $arEvent;
			$arEventMessageFields = $arEvent["PATTERN"];
			
			unset($arEventFields["PATTERN"]);
			
			$obEventType = new CEventType();
			$obEventType->Add($arEventFields);
			
			$obEventMessage = new CEventMessage();
			$obEventMessage->Add($arEventMessageFields);
		}
		
		unset($dbEventType, $obEventType, $obEventMessage, $arEventFields, $arEventMessageFields);
	}
?>