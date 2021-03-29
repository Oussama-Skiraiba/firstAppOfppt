<?php

// include file init.php 
require_once "../inc/init.php";

if($_SERVER["REQUEST_METHOD"] === "GET"){
    echo json_encode(sreachLikeItem(""));
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = $_POST["name"];
    removetItem($name);
}