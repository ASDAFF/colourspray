<? $GLOBALS['_1587163056_']=Array('in' .'tv' .'al','intval','' .'int' .'val','intval','' .'in_arr' .'ay','is_arr' .'ay','is_' .'ar' .'ray','in' .'tv' .'al','is_ar' .'ra' .'y','i' .'s_array','in_a' .'rray','i' .'s_array','' .'is' .'_arra' .'y','intval','' .'in_ar' .'ray','in_array','preg_re' .'pla' .'ce','a' .'r' .'ra' .'y_k' .'eys','is_' .'arr' .'a' .'y','in_arr' .'ay'); ?><? function _636118155($i){$a=Array('ID','startshop_price_groups','PRICE','GROUPS','LANG','BASE','Y','GROUPS','LANG','CODE','CODE','CODE','CODE','CODE','CODE','BASE','Y','ID','startshop_price','ID','/^(>=|<=|=|!|>|<)/','','startshop_price','LANG','GROUPS','ID','LID','ASC','PRICE','startshop_price_groups','PRICE','PRICE','LANG','LID',"NAME",'NAME','PRICE','GROUPS','GROUP','',' OR `startshop_price_groups`.`GROUP` = \'','ID','PRICE','GROUP','ID');return $a[$i];} ?><? class CStartShopPrice extends CStartShop implements CStartShopInterface{private static $arFieldsEditable=array('CODE','SORT','BASE','ACTIVE');public static function getArFieldsEditable(){return static::$arFieldsEditable;}private static $arFieldsFiltering=array('ID','CODE','SORT','BASE','ACTIVE');public static function getArFieldsFiltering(){return static::$arFieldsFiltering;}protected static $sLanguageTable="startshop_price_language";protected static $sLanguageTableLink="PRICE";protected static $sLanguageTableLanguage="LID";protected static $arLanguageFields=array("NAME");public static function SetBase($_0){$_0=$GLOBALS['_1587163056_'][0]($_0);$_1=static::GetBase()->Fetch();$_2=static::GetByID($_0)->Fetch();if($_2){CStartShopDBQueryBX::Update()->Tables('startshop_price')->Values(array('BASE'=> 'N'))->Execute();CStartShopDBQueryBX::Update()->Tables('startshop_price')->Values(array('BASE'=> 'Y'))->Where(array(_636118155(0)=> $_0))->Execute();static::ResetCacheByUnique($_1['ID']);static::ResetCacheByUnique($_2['ID']);static::ResetCacheBase();}}private static function AddGroup($_0,$_3){$_0=$GLOBALS['_1587163056_'][1]($_0);$_3=$GLOBALS['_1587163056_'][2]($_3);if($_0>round(0)&& $_3>round(0)){CStartShopDBQueryBX::Insert()->Into('startshop_price_groups')->Values(array('PRICE'=> $_0,'GROUP'=> $_3))->Execute();return true;}return false;}private static function DeleteGroups($_0){$_0=$GLOBALS['_1587163056_'][3]($_0);CStartShopDBQueryBX::Delete()->From(_636118155(1))->Where(array(_636118155(2)=> $_0))->Execute();return true;}private static function DeleteGroupsAll(){CStartShopDBQueryBX::Delete()->From('startshop_price_groups')->Execute();return true;}public static function Add($_4){if(empty($_4['CODE']))return false;$_5=$_4[_636118155(3)];$_6=$_4[_636118155(4)];$_4=CStartShopUtil::ArrayFilter($_4,function($_7){return $GLOBALS['_1587163056_'][4]($_7,CStartShopPrice::getArFieldsEditable());},STARTSHOP_UTIL_ARRAY_FILTER_USE_KEY);if(!$GLOBALS['_1587163056_'][5]($_5))$_5=array();if(!$GLOBALS['_1587163056_'][6]($_6))$_6=array();$_8=(bool)static::GetList(array(),array('CODE'=> $_4['CODE']))->Fetch();if($_8)return false;$_9=CStartShopDBQueryBX::Insert()->Into('startshop_price')->Values($_4)->Execute();if($_9){if($_4[_636118155(5)]== _636118155(6))static::SetBase($_9);foreach($_6 as $_7 => $_10)static::SetLanguage($_9,$_7,$_10);foreach($_5 as $_3)static::AddGroup($_9,$_3);CStartShopToolsIBlock::UpdatePropertiesAll();return $_9;}return false;}public static function Update($_0,$_4){$_0=$GLOBALS['_1587163056_'][7]($_0);$_5=$_4[_636118155(7)];$_6=$_4[_636118155(8)];$_8=false;$_2=static::GetByID($_0)->Fetch();if(empty($_2))return false;if(!$GLOBALS['_1587163056_'][8]($_5))$_5=false;if(!$GLOBALS['_1587163056_'][9]($_6))$_6=false;if(isset($_4[_636118155(9)])&& empty($_4[_636118155(10)]))unset($_4[_636118155(11)]);if(isset($_4[_636118155(12)]))if($_4[_636118155(13)]!= $_2[_636118155(14)])$_8=(bool)static::GetList(array(),array('CODE'=> $_4['CODE']))->Fetch();if($_8)return false;$_4=CStartShopUtil::ArrayFilter($_4,function($_7){return $GLOBALS['_1587163056_'][10]($_7,CStartShopPrice::getArFieldsEditable());},STARTSHOP_UTIL_ARRAY_FILTER_USE_KEY);if(!empty($_4)){if($_4[_636118155(15)]== _636118155(16))static::SetBase($_0);CStartShopDBQueryBX::Update()->Tables('startshop_price')->Values($_4)->Where(array(_636118155(17)=> $_0))->Execute();}if($GLOBALS['_1587163056_'][11]($_6)){static::DeleteLanguages($_0);foreach($_6 as $_7 => $_10)static::SetLanguage($_0,$_7,$_10);}if($GLOBALS['_1587163056_'][12]($_5)){static::DeleteGroups($_0);foreach($_5 as $_3)static::AddGroup($_0,$_3);}static::ResetCacheByUnique($_0);CStartShopToolsIBlock::UpdatePropertiesAll();return true;}public static function Delete($_0){$_0=$GLOBALS['_1587163056_'][13]($_0);CStartShopDBQueryBX::Delete()->From(_636118155(18))->Where(array(_636118155(19)=> $_0))->Execute();static::DeleteLanguages($_0);static::DeleteGroups($_0);static::ResetCacheByUnique($_0);CStartShopToolsIBlock::UpdatePropertiesAll();return true;}public static function DeleteAll(){CStartShopDBQueryBX::Delete()->From('startshop_price')->Execute();static::DeleteLanguagesAll();static::DeleteGroupsAll();static::ResetCache();CStartShopToolsIBlock::UpdatePropertiesAll();return true;}public static function GetList($_11=array(),$_12=array()){$_13=array();$_11=CStartShopUtil::ArrayFilter($_11,function($_7){return $GLOBALS['_1587163056_'][14]($_7,CStartShopPrice::getArFieldsFiltering());},STARTSHOP_UTIL_ARRAY_FILTER_USE_KEY);$_12=CStartShopUtil::ArrayFilter($_12,function($_7){return $GLOBALS['_1587163056_'][15]($GLOBALS['_1587163056_'][16](_636118155(20),_636118155(21),$_7),CStartShopPrice::getArFieldsFiltering());},STARTSHOP_UTIL_ARRAY_FILTER_USE_KEY);$_14=CStartShopDBQueryBX::Select()->From(_636118155(22))->Where($_12)->OrderBy($_11)->Execute();while($_2=$_14->Fetch()){$_2[_636118155(23)]=array();$_2[_636118155(24)]=array();$_13[$_2[_636118155(25)]]=$_2;}if(!empty($_13)){$_15=$GLOBALS['_1587163056_'][17]($_13);$_16=static::GetLanguageList(array(_636118155(26)=> _636118155(27)),array(_636118155(28)=> $_15));$_17=CStartShopDBQueryBX::Select()->From(_636118155(29))->Where(array(_636118155(30)=> $_15))->Execute();while($_10=$_16->Fetch())$_13[$_10[_636118155(31)]][_636118155(32)][$_10[_636118155(33)]]=array(_636118155(34)=> $_10[_636118155(35)]);while($_18=$_17->Fetch())$_13[$_18[_636118155(36)]][_636118155(37)][]=$_18[_636118155(38)];}return CStartShopUtil::ArrayToDBResult($_13);}public static function GetBase(){if(!CStartShopCache::IsExists('CStartShopPrice.Common','BASE')){$_14=static::GetList(array(),array('BASE'=> 'Y'));$_14=CStartShopCache::CreateFromResult('CStartShopPrice.Common','BASE',$_14);}else{$_14=CStartShopCache::GetAsResult('CStartShopPrice.Common','BASE');}return $_14;}public static function GetByID($_0){if(!CStartShopCache::IsExists('CStartShopPrice.Items',$_0)){$_14=self::GetList(array(),array("ID"=> $_0));$_14=CStartShopCache::CreateFromResult('CStartShopPrice.Items',array('ID','CODE'),$_14);}else{$_14=CStartShopCache::GetAsResult('CStartShopPrice.Items',$_0);}return $_14;}public static function GetByCode($_19){if(!CStartShopCache::IsExists('CStartShopPrice.Items',$_19)){$_14=self::GetList(array(),array("CODE"=> $_19));$_14=CStartShopCache::CreateFromResult('CStartShopPrice.Items',array('ID','CODE'),$_14);}else{$_14=CStartShopCache::GetAsResult('CStartShopPrice.Items',$_19);}return $_14;}public static function ResetCacheBase(){CStartShopCache::Clear('CStartShopPrice.Common','BASE');}public static function ResetCacheByUnique($_20){if(CStartShopCache::IsExists('CStartShopPrice.Items',$_20)){$_21=CStartShopCache::Get('CStartShopPrice.Items',$_20);CStartShopCache::Clear('CStartShopPrice.Items',$_21['ID']);CStartShopCache::Clear('CStartShopPrice.Items',$_21['CODE']);}}public static function ResetCache(){CStartShopCache::ClearPath('CStartShopPrice.Items');CStartShopCache::ClearPath('CStartShopPrice.Common');}public static function GetListByGroups($_5){global $DB;$_13=array();if($GLOBALS['_1587163056_'][18]($_5)&&!empty($_5)){$_22=array();$_23=_636118155(39);foreach($_5 as $_3)$_23 .= _636118155(40) .$DB->ForSql($_3) .'\'';$_24=$DB->Query('SELECT * FROM `startshop_price` ' .'LEFT JOIN `startshop_price_groups` ON `startshop_price`.`ID` = `startshop_price_groups`.`PRICE` ' .'WHERE `startshop_price_groups`.`GROUP` IS NULL' .$_23);while($_2=$_24->Fetch())if(!$GLOBALS['_1587163056_'][19]($_2[_636118155(41)],$_22)){unset($_2[_636118155(42)],$_2[_636118155(43)]);$_13[]=$_2;$_22[]=$_2[_636118155(44)];}}$_14=new CDBResult();$_14->InitFromArray($_13);return $_14;}} ?>
