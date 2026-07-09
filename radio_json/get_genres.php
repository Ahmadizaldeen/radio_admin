<?php
header("Content-Type: application/json; charset=utf8-mb4");
define('BASE_PATH', dirname(__DIR__));
#print_r(BASE_PATH);
$dbPath = BASE_PATH .'/radio_admin/db.php';
require $dbPath;
$pdo = db_conn();
$sql = "SELECT * FROM genres";
$stmt = $pdo->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$jsonString = json_encode($results);

// Output or return the JSON
echo $jsonString;