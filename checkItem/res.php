<?php
// include file init.php 
require_once "../inc/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $prix = $_POST["prix"];
    $dataTime = $_POST["dataTime"];
    $dateFin = $_POST["dateFin"];
    $Description = $_POST["Description"];
    // $uploadImage = $_POST["uploadImage"];
    $quantity = $_POST["quantity"];
    #include file id Item
    if (sreachItem($name) == 1) {
        echo  json_encode(array("message" => "no"));
    } else {
        try {
            // handel and  upload image 
            if ($_FILES['uploadImage']['size'] > 1000000) {
                echo json_encode(array("message" => "Exceeded filesize limit."));
                exit;
            }
            $fileNameCmps = explode(".", $_FILES["uploadImage"]["name"]);
            $fileExtension = strtolower(end($fileNameCmps));
            if (in_array($fileExtension, array('jpg', 'png'))) {
                $uniqid =  uniqid() . "." . time() . "." . $fileExtension;
                $target_file = "../upload/img/" . $uniqid;
                if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file)) {
                    $stmt = $db->prepare("INSERT INTO medicine(_name,_description,_img_url,_quantity,_price,_datatime,_datafine) 
                    VALUES (?,?,?,?,?,?,?)");
                    $stmt->bindValue(1, $name);
                    $stmt->bindValue(2, $Description);
                    $stmt->bindValue(3, $uniqid);
                    $stmt->bindValue(4, $quantity);
                    $stmt->bindValue(5, floatval($prix));
                    $stmt->bindValue(6, $dataTime);
                    $stmt->bindValue(7, $dateFin);
                    $stmt->execute();
                    $stmt = null;
                    echo  json_encode(array("message" => "yes"));
                    exit;
                }
            }
        } catch (Exception $e) {
            echo  json_encode(array("message" => "error"));
        }
    }
}