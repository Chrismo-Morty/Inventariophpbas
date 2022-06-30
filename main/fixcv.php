<?php
    session_start();
    require_once "../Database/Databasecv.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }
    if($_POST['nombre_lab'] != null && $_POST['computer'] != null){
        $sql = "UPDATE cv SET nombre_lab = '" . trim($_POST['nombre_lab']) . "' ,jefe_lab = '" . trim($_POST['jefe_lab']) . "' ,fabricante = '" . trim($_POST['fabricante']) .  "' ,fecha_adquirida = '" . trim($_POST['fecha_adquirida']) .  "' ,computer = '" . trim($_POST['computer']) .  "' ,ubicacion = '" . trim($_POST['ubicacion']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conna->query($sql)){
            echo "<script>alert('Proceso completado exitósamente')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
        else{
            echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor diligencia todos los campos')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conna);
?>
