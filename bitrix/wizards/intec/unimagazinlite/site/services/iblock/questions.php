<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('questions.xml', 'feedback', 'unimagazinlite_questions', array(
		"FIELDS" => array(
			'CODE' => array(
				'IS_REQUIRED' => 'N',
				'DEFAULT_VALUE' => array(
					'UNIQUE' => 'N'
				)
			)
		)
	));
    
    $arVars = __getVars();
    $arVars['MACROS']['QUESTIONS_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['QUESTIONS_IBLOCK_TYPE'] = 'feedback';
    __setVars($arVars);
?>