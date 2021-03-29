<?php
require_once "../inc/init.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $column = "_name, _description, _img_url, _quantity, _price, _datatime, _datafine";
    $stmt = $db->prepare("SELECT * FROM medicine WHERE _id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(array("response" => $data));
}
