<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$res = CIBlockSection::GetList(array("NAME"=>"ASC"),array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "SITE_ID" => SITE_ID),false, array(),false);
	while($stores = $res->GetNextElement())
		{
		  $fields = $stores->GetFields();
		  $ar[]=$fields;
		}
?>
<div class="dotted_line"></div>
	<ul class="city_list">
		<?if(is_array($ar)){
		foreach($ar as $stores){?>
		<li class="clearfix"><a href="<?=$stores["SECTION_PAGE_URL"]?>"><?=$stores["NAME"]?></a></li>
		<?}}?>
	</ul>
<div class="dotted_line"></div>	

