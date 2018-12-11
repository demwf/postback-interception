<?php
#index.php
//Ссылка для постбека (указывать в ПП)
//http://trp.2amazing.ru/p.php?n=custom&ak=c36e8e7b64&profit={profit}&txt_param20=USD&subid={p1}&event_id={event_id}&event={event}&campaign_id={campaign_id}&landing_id={landing_id}&operator_id={operator_id}

//Итоговая ссылка постебка для перебрасывания в трекер
//http://trp.2amazing.ru/track/p.php?n=custom&ak=c36e8e7b64&txt_param20=USD&subid={p1}&profit={profit}

//$start = microtime(true);
(include_once 'private.php');

date_default_timezone_set('Europe/Moscow');
$date = date('Y-m-d H:i:s'); 


foreach($_GET as $key => $value){
	switch ($key) {
		case "subid": $subid = $value; break;
		case "profit": $profit = $value; break;
		case "event": $event = $value; break;
		case "event_id": $event_id = $value; break;
		case "campaign_id": $campaign_id = $value; break;
		case "landing_id": $landing_id = $value; break;
		case "operator_id": $operator_id = $value; break;
		
		case "n": break;
		case "ak": break;
		case "txt_param20": break;
	}
};

// ---=== Блок инсерта ===---
$conn = new mysqli($HOST, $USER, $PASS, $BD);

/* Проверка соединения */ 
if (mysqli_connect_errno()) { 
	printf("Подключение невозможно: %s\n", mysqli_connect_error()); 
    exit(); 
} 

/* изменение набора символов на utf8 */
if (!$conn->set_charset("utf8")) {
    //printf("Ошибка при загрузке набора символов utf8: %s\n", $conn->error);
    exit();
} else {
    //printf("Текущий набор символов: %s\n", $conn->character_set_name());
}

$stmt = $conn->prepare('INSERT INTO tbl_postback_all(subid, profit, event, event_id, campaign_id, landing_id, operator_id, pp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->bind_param('ssssssss', $subid_, $profit_, $event_, $event_id_, $campaign_id_, $landing_id_, $operator_id_, $pp); 

$subid_ = $subid;
$profit_ = $profit;
$event_ = $event;
$event_id_ = $event_id;
$campaign_id_ = $campaign_id;
$landing_id_ = $landing_id;
$operator_id_ = $operator_id;
$pp = "GG";

$stmt->execute(); 
$stmt->close();
$conn->close();

// ---=== Конец блока инсерта ===---

// надо получить вот такой постбек
//http://trp.2amazing.ru/track/p.php?n=custom&ak=c36e8e7b64&profit={profit}&txt_param20=USD&subid={p1}
$url = $DOMAIN_REDIRECT.$ADDITIONAL_UTM.'&subid='.$subid.'&profit='.$profit;
header('location: '.$url);
?>
	