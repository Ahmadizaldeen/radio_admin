<?php
require_once "db.php";
$stmt = $pdo->prepare("SELECT * FROM stations");
$stmt->execute([]);
$allStations = $stmt->fetchAll();
