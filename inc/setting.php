<?php

session_start();

// #include file configPdo.php
require "../inc/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // handel and  upload image 
        if ($_FILES['uploade']['size'] > 1000000) {
            echo json_encode(array("message" => "Exceeded filesize limit."));
            exit;
        }
        $fileNameCmps = explode(".", $_FILES["uploade"]["name"]);
        $fileExtension = strtolower(end($fileNameCmps));
        if (in_array($fileExtension, array('jpg', 'png'))) {
            $uniqid =  uniqid() . "." . time() . "." . $fileExtension;
            $target_file = "../upload/img/" . $uniqid;
            if (move_uploaded_file($_FILES["uploade"]["tmp_name"], $target_file)) {
                $SesiionName = $_SESSION["name"];
                $arr = array($uniqid,$SesiionName);
                UpadateItem($arr);
                echo json_encode(array("sjksjk"=> $SesiionName));
                // echo json_encode(array("count"=> $arr));
            }
        }
    } catch (Exception $e) {
        echo  json_encode(array("message" => "error"));
    }
}
