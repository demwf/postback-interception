<?php
#index.php
(include_once 'private.php');
?>

<!DOCTYPE HTML >
<html>
    <head>
		<meta http-equiv="Content-Type" Content="text/html; Charset=utf-8">
    	<title>Лента сообщений</title>
		<!--<link rel="stylesheet" type="text/css" href="css/reset.css">-->
    	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
<body>
<?php

$mysqli = new mysqli($HOST, $USER, $PASS, $BD); 

/* Проверка соединения */ 
if (mysqli_connect_errno()) { 
	printf("Подключение невозможно: %s\n", mysqli_connect_error()); 
    exit(); 
} 

/* изменение набора символов на utf8 */
if (!$mysqli->set_charset("utf8")) {
    //printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
} else {
    //printf("Текущий набор символов: %s\n", $mysqli->character_set_name());
}

$stmt = $mysqli->prepare("SELECT `id`, DATE_FORMAT(`date`, '%H:%i:%s') date, `request_method`,`remote_addr`, `http_referer`, `http_user_agent`, `server_name`, `request_uri`, `remote_host`, `duration`, `utm`, `full` FROM `work` WHERE DATE_FORMAT(date, '%d %M %Y') = DATE_FORMAT(curdate(), '%d %M %Y') order by date DESC"); 

//$stmt = $mysqli->prepare("SELECT `id`, DATE_FORMAT(`date`, '%H:%i:%s') date, `request_method`,`remote_addr`, `http_referer`, `http_user_agent`, `server_name`, `request_uri`, `remote_host`, `duration`, `utm`, `full` FROM `work` WHERE DATE_FORMAT(date, '%d %m %Y') = '18 04 2017' order by date DESC"); 
//$stmt->bind_param('s', DATE_FORMAT(curdate(), '%d %M %Y')); 
$stmt->execute(); 
$result = $stmt->get_result();
$rows = $stmt->affected_rows; 
$stmt->close();

date_default_timezone_set('Europe/Moscow');
$date = date('d-M-Y');
echo "<h2>Статистика<br>";
echo "Данные за: ",$date , " (Время московское)</h2> ";
echo "<h3>Выбрано (строк): $rows</h3>";
echo "<table>";
echo "<tr><th>id</th><th>Время</th><th>Метки</th><th>Длительность (сек)</th><th>Запрос</th></tr>";

    // Заметка: если вы добавите extract($row); в начало цикла, вы сделаете
    //          доступными переменные $userid, $fullname, $userstatus.
    while ($row = $result->fetch_assoc()) {
        extract($row);

		echo "<tr><td>$id</td><td>$date</td><td>";
		
		//echo "<tr style='border: 1px solid black;'><td style='border: 1px solid black;'>$id</td><td style='border: 1px solid black;'>$date</td><td style='border: 1px solid black;'>";
		
		foreach(unserialize($utm) as $key => $value){
    	echo $key .' = '.$value.'<br>';
		};
		
		
		echo "</td><td>$duration</td><td>$full$request_uri</td></tr>";
		
		//echo "</td><td style='border: 1px solid black;'>$duration</td>
		//<td style='border: 1px solid black;'>$full$request_uri</td></tr>";

    } 

echo "</table>";
$result->free();
$mysqli->close();

?>
	</body>
</html>


