<?php

// #include file configPdo.php
require "../inc/configPdo.php";


function sreachItem($name)
{
        global $db;
        $stmt = $db->prepare("SELECT _name from medicine  
                        WHERE  _name = ?");
        $stmt->bindValue(1, $name);
        $stmt->execute();
        $count = $stmt->rowCount();
        $stmt = null;
        return $count;
}

function sreachLikeItem($name)
{
        $query = "";
        $countColumn = " _name ,_quantity,_price";
        if ($name !== "") {
                $query = "WHERE _name  LIKE  ?";
                $countColumn = "*";
        }
        global $db;
        $stmt = $db->prepare("SELECT $countColumn from medicine $query ;");
        $stmt->bindValue(1, '%' . $name . '%');
        $stmt->execute();
        return  $stmt->fetchAll();
}


function removetItem($name)
{
        global $db;
        $stmt = $db->prepare("DELETE  from medicine  
                        WHERE  _name = ?");
        $stmt->bindValue(1, $name);
        $stmt->execute();
        echo "yes";
}

function UpadateItem($arr)
{
        global $db;
        $query = "UPDATE employee SET img = ? WHERE _name = ?";
        if (count($arr) > 2) {
                $query = "UPDATE  medicine SET _description = ?, _quantity = ?,_img_url = ?, _price = ?, _datatime = ?,_datafine = ? WHERE  _name = ?;"; 
        }
        $stmt = $db->prepare($query);
        if (count($arr) > 2) {
                $stmt->bindValue(1, $arr[0]);
                $stmt->bindValue(2, $arr[1]);
                $stmt->bindValue(3, $arr[2]);
                $stmt->bindValue(4, $arr[3]);
                $stmt->bindValue(5, $arr[4]);
                $stmt->bindValue(6, $arr[5]);
                $stmt->bindValue(7, $arr[6]);
        } else {
                $stmt->bindValue(1, $arr[0]);
                $stmt->bindValue(2, $arr[1]);
        }
        $stmt->execute();
}
