<?php
$host = 'db';
$db_name = 'magazin';
$db_user = 'root';
$db_pas = '1234';

try {
    $db = new PDO('mysql:host='.$host.';dbname='.$db_name,$db_user,$db_pas);
}
catch (PDOException $e) {
    print "error: " . $e->getMessage();
    die();
}
$stmt = $db->query("SELECT t.ID,t.TITLE,t.DESCRIPTION,t.PRICE,t.COUNT,k.TITLE AS KAT FROM 'tovary' AS t JOIN 'kategorii' AS k ON t.ID_KAT=");
while ($row = $stmt->fetch()) {
    echo $row['TITLE'].'<br>';
}
?>