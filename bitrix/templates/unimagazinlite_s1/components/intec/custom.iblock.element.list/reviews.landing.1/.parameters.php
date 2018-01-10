<?
    $arTemplateParameters = array(
        "SHOW_ALL_ELEMENTS" => array(
            "NAME" => GetMessage("SHOW_ALL_ELEMENTS"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
            "REFRESH" => "Y"
        )
    );
    
    if ($arCurrentValues['SHOW_ALL_ELEMENTS'] != "Y") {
        $arTemplateParameters["MAIN_ELEMENTS_COUNT"] = array(
            "NAME" => GetMessage("MAIN_ELEMENTS_COUNT"),
            "TYPE" => "STRING"
        );
        $arTemplateParameters["LINK_TO_ELEMENTS"] = array(
            "NAME" => GetMessage("LINK_TO_ELEMENTS"),
            "TYPE" => "STRING",
        );
    }
?>