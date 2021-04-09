<?php
session_start();
if (empty($_SESSION["name"])) {
    header('Location:http://localhost/proge/test.php');
    exit;
}