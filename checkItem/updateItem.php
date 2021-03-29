<?php

// include file init.php 
require_once "../inc/init.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search = $_GET["search"];
    echo json_encode(sreachLikeItem($search));
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $prix = $_POST["prix"];
    $dataTime = $_POST["dataTime"];
    $dateFin = $_POST["dateFin"];
    $Description = $_POST["Description"];
    $quantity = $_POST["quantity"];

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
                $arr = array($Description, intval($quantity), $uniqid, floatval($prix), $dataTime, $dateFin, $name);
                UpadateItem($arr);
                echo  "yes";
                exit;
            }
        }
    } catch (Exception $e) {
        echo   "error";
    }
}
