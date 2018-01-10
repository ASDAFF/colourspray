<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
    return;?>
<?
$arIBlockType = CIBlockParameters::GetIBlockTypes();
$arIBlock=array();
$rsIBlock = CIBlock::GetList(
    Array("sort" => "asc"),
    Array("TYPE" => $arCurrentValues["IBLOCK_CATALOG_TYPE"], "ACTIVE"=>"Y")
);
while($arr=$rsIBlock->Fetch())
{
    $arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arIBlockServ=array();
$rsIBlockServ = CIBlock::GetList(
    Array("sort" => "asc"),
    Array("TYPE" => $arCurrentValues["IBLOCK_SERVICES_TYPE"], "ACTIVE"=>"Y")
);
while($arr=$rsIBlockServ->Fetch())
{
    $arIBlockServ[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arTemplateParameters = array(
    "IBLOCK_CATALOG_TYPE"=>array(
        "NAME" => GetMessage("IBLOCK_CATALOG_TYPE"),
        "TYPE" => "LIST",
        "VALUES" => $arIBlockType,
        "REFRESH" => "Y",
    ),
    "IBLOCK_CATALOG_ID"=>array(
        "NAME" => GetMessage("IBLOCK_CATALOG_ID"),
        "TYPE" => "LIST",
        "VALUES" => $arIBlock,
        "REFRESH" => "Y",
        "ADDITIONAL_VALUES" => "Y",
    ),
    "IBLOCK_CATALOG_DIR"=>array(
        "NAME" => GetMessage("IBLOCK_CATALOG_DIR"),
        "TYPE" => "TEXT",
        "DEFAULT" => "Y",
    ),
    "IBLOCK_SERVICES_TYPE"=>array(
        "NAME" => GetMessage("IBLOCK_SERVICES_TYPE"),
        "TYPE" => "LIST",
        "VALUES" => $arIBlockType,
        "REFRESH" => "Y",
    ),
    "IBLOCK_SERVICES_ID"=>array(
        "NAME" => GetMessage("IBLOCK_SERVICES_ID"),
        "TYPE" => "LIST",
        "VALUES" => $arIBlock,
        "REFRESH" => "Y",
        "ADDITIONAL_VALUES" => "Y",
    ),
    "IBLOCK_SERVICES_DIR"=>array(
        "NAME" => GetMessage("IBLOCK_SERVICES_DIR"),
        "TYPE" => "TEXT",
        "DEFAULT" => "Y",
    )
);?>