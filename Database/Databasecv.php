<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "vida";
    $conna = new mysqli($host , $user, $pass, $dbname);
    mysqli_query($conna , "SET character_set_result=utf8");
    if($conna->connect_error){
        die("Database Error : " . $conna->connect_error);
    }
?>