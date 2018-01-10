<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
global $APPLICATION;

$rsGroups = CGroup::GetList(($by="c_sort"), ($order="desc"), array('STRING_ID' => 'site_owners_group'))->Fetch();
if (!$rsGroups) {
	include('.utils.php');
	WizardServices::IncludeServiceLang("group.php", LANGUAGE_ID);

	$group = new CGroup;
	$arFields = Array(
	  "ACTIVE"       => "Y",
	  "C_SORT"       => 100,
	  "STRING_ID" 	 => "site_owners_group",
	  "NAME"         => GetMessage('NAME_USER_GROUP')
	  );
	$NEW_GROUP_ID = $group->Add($arFields);

	$arModules = array(
		'form' => 'W',
		'sale' => 'U',
		'scale' => 'U',
		'intec.unimagazinlite' => 'D',
		'main' => 'P',
		'mobileapp' => 'R',
		'perfmon' => 'R',
		'translate' => 'W'
	);

	foreach ($arModules as $MID=>$rt) {
		$APPLICATION->SetGroupRight($MID, $NEW_GROUP_ID, $rt, false);
	}

	$arTasks = array
	(
		'catalog' => 18,
		'fileman' => 24,
		'main' => 2,
		'seo' => 51
	);
	CGroup::SetTasks($NEW_GROUP_ID, $arTasks);	
}
?>