<?php
$host = 'db';
$db_name = 'magazin';
$db_user = 'root';
$db_pas = '1234';

try {
    $db = new PDO('mysql:host='.$host.';dbname='.$db_name,$db_user,$db_pas);
}
catch (PDOExpection $e) {
    print "error: " . $e->getMessage();
    die();
}

$result = '{"response":[';
$stmt = $db->query("SELECT t.`ID`,`TITLE`,`DESCRIPRION`,`PRICE`,`COUNT`,`NAME` FROM `tovary` AS t JOIN `category` AS k ON t.ID_CAT=k.ID");
while ($row = $stmt->fetch()) {
    $result .= '{';
    $result .= '"id":'.$row['ID'].',"title":"'.$row['TITLE.'].'","desc":"'.$row['DESCRIPTION'].'","price":'.$row['PRICE'].',"count":'.$row['COUNT'].',"kat":"'.$row['NAME'].'"';
    $resukt .= '},';
}
$result = rtrim($result, ",");
$result .= ']}';
echo $result;
?>