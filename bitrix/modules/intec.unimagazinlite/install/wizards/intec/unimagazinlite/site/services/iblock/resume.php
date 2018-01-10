<?
    include('.utils.php');
    $iIBlockID = __importIBlockFile('resume.xml', 'feedback', 'unimagazinlite_resume', array(
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
    $arVars['MACROS']['RESUME_IBLOCK_ID'] = $iIBlockID;
    $arVars['MACROS']['RESUME_IBLOCK_TYPE'] = 'feedback';
    __setVars($arVars);
?>