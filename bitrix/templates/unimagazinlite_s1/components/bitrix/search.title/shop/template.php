<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
	function inputClean($input, $sql=false) 
	{
	    $input = htmlentities($input, ENT_QUOTES, LANG_CHARSET);
	    if(get_magic_quotes_gpc ())
	    {
	        $input = stripslashes ($input);
	    }
	    if ($sql)
	    {
	        $input = mysql_real_escape_string ($input);
	    }
	    $input = strip_tags($input);
	    $input=str_replace ("\n"," ", $input);
	    $input=str_replace ("\r","", $input);
	    return $input;
	}
?>


<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
	<div id="<?echo $CONTAINER_ID?>" class="search">
		<form action="<?echo $arResult["FORM_ACTION"]?>">
			<input id="<?echo $INPUT_ID?>" type="text" name="q" value="<?if (isset($_REQUEST["q"])) echo htmlspecialcharsbx(inputClean($_REQUEST["q"]))?>" size="40" maxlength="50" autocomplete="off" placeholder="<?=GetMessage("BSF_T_SEARCH_PLACEHOLDER")?>" /><button name="s" type="submit" value="<?=GetMessage("CT_BST_SEARCH_BUTTON");?>"></button>
		</form>
	</div>
<?endif?>
<script type="text/javascript">
var jsControl = new JCTitleSearch({
	//'WAIT_IMAGE': '/bitrix/themes/.default/images/wait.gif',
	'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
	'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
	'INPUT_ID': '<?echo $INPUT_ID?>',
	'MIN_QUERY_LEN': 2
});

$("#<?=$INPUT_ID?>").attr("value", "<?if (isset($_REQUEST["q"])) echo htmlspecialcharsbx(inputClean($_REQUEST["q"]))?>");
</script>
