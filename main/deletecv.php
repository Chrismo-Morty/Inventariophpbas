<?php
    session_start();
    require_once "../Database/Databasecv.php";
    if ($_SESSION['username'] == null){
        echo "<script>alert('Favor ingresar con tus credenciales')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();

    }
    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM cv WHERE id = '$delete_num'";
    $query_delete = mysqli_query($conna,$sql_delete);
    $row = mysqli_fetch_assoc($query_delete,MYSQLI_ASSOC);
    if(!$row){
        echo "<script>alert('Eliminación de Hoja de vida Exitosa')</script>";        
        header("Refresh: 0 , url = ../list.php");
        exit();

    }
    else{
        echo "<script>alert('No se pudo eliminar hoja de vida')</script>";
        header("Refresh: 0 , url = ../list.php");
        exit();

    }
    mysqli_close($conna);
?>