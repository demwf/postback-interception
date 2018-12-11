<?php
#index.php
//$start = microtime(true);
(include_once 'private.php');

date_default_timezone_set('Europe/Moscow');
$date = date('Y-m-d H:i:s'); 
		//echo $date, "<br>";  // 2011-01-07 18:32:42
		

		//echo "REQUEST_METHOD: ", $_SERVER['REQUEST_METHOD'];echo "<br>";
		 
		//echo "REMOTE_ADDR: ", $_SERVER['REMOTE_ADDR'];echo "<br>";
		//echo "HTTP_REFERER: ", $_SERVER['HTTP_REFERER'];echo "<br>";
		//echo "HTTP_USER_AGENT: ", $_SERVER['HTTP_USER_AGENT'];echo "<br>";
//$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		//echo 'SERVER_NAME + REQUEST_URI: ', $url, "<br>";
		
		//echo "REMOTE_HOST: ", $_SERVER['REMOTE_HOST'];echo "<br>";
		//$str = $_SERVER['QUERY_STRING']; 
		//echo "QUERY_STRING: ", $str; echo "<br>";
		//$str_temp = "?adv_id=octobird&place_id={OB_SITE}&tizer_id={OB_BANNER}";
		
		
		
		//echo "<br> Вывод foreach-ем: <br>";
		//foreach($_GET as $key => $value){
    	//echo $key .' = '.$value.'<br>';
		//};
		
		//echo "<br> Вывод parse_str-ом: <br>";
		//parse_str($str, $gt);
		//echo print_r($gt);
		
		//echo "<br><br> Длинна массива: ";
		
		//echo count($gt);
				
		//echo "<br><br> Присвоение массива _GET переменной через serialize() / unserialize(): <br>";
		//$sgt2 = serialize($_GET);
		//$gt2 = unserialize($sgt2);
		//echo print_r($gt2);
		//echo "<br>";
		//echo count($gt2);
		//echo "<br>";
		//$gt2_single = array_keys ($gt2); 
		//$gta_single_key = array_values ($gt2);
		
		
		
		//echo 'Время выполнения скрипта: '.$time.' сек.';
		
		// Инсерт в бд

/*$link = mysql_connect($HOST,$USER,$PASS);
mysql_select_db($BD);   
mysql_set_charset('utf8');
$time = microtime(true) - $start;
$sql = "INSERT INTO `work`(`date`, `request_method`, `remote_addr`, `http_referer`, `http_user_agent`, `server_name`, `request_uri`, `remote_host`, `duration`, `utm`) VALUES (
STR_TO_DATE('".$date."','%Y-%m-%d %H:%i:%s')
,'".$_SERVER['REQUEST_METHOD'].
"','".$_SERVER['REMOTE_ADDR'].
"','".$_SERVER['HTTP_REFERER'].
"','".$_SERVER['HTTP_USER_AGENT'].
"','".$_SERVER['SERVER_NAME'].
"','".$_SERVER['REQUEST_URI'].
"','".$_SERVER['REMOTE_HOST'].
"','".$time.
"','".serialize($_GET)."')";
		
		//echo $sql;
		
mysql_query($sql);
mysql_close($link);
*/






foreach($_GET as $key => $value){
	if (strtolower($key) == 'utm_source') $utm_source = $value;
	if (strtolower($key) == 'profit') $profit = $value;
};


//$url = $DOMAIN_STATISTICS.'subid='.$utm_source.'&profit='.$profit.'&'.$ADDITIONAL_UTM;
//header('location: '.$url);

$url = $DOMAIN_REDIRECT.'subid='.$utm_source.'&profit='.$profit.'&'.$ADDITIONAL_UTM;
header('location: '.$url);
	
?>
	