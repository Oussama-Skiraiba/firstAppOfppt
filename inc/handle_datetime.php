<?php
// include file init.php 
require_once "./configPdo.php";

$query = "SELECT _datatime FROM `medicine`";

$stmt = $db->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_COLUMN);
echo json_encode(array("response" => $data));
