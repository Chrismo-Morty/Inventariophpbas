<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Busqueda de Equipos</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <section class="principal">
        <h1>
            Busqueda de Equipos
        </h1>
        <div class ="form-1-2">
            <label for ="caja_busqueda">Buscar:</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
        </div>
        <div id="datos">
        
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<head>
    <title>Buscar Equipos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #fd7e1b;
        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: #298dba;
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        .button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #e60000;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: white;
            width: 40%;
            padding-bottom: 10px;
        }

        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }

        table {
            width: 100%;
        }

        th {
            color: black;
            background-color: #298dba;
        }

        tr {
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .timeregis {
            text-align: center;
        }

        .form-group {
            margin-left: 600px;
        }

        [type=text], [type=number] {
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: transparent;
            padding: 7px 200px 7px 5px;
        }

        .return {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;

        }

        .return:hover {
            background-color: #fdb515;
            color: white;
        }

        .modify {
            border-radius: 15px;
            border: transparent;
            color: white;
            padding: 4px 40px 4px 40px;
            margin: 0px 50px 50px 100px;
            font-size: 20px;
            border-collapse: collapse;
            background-color: #00A600;
            font-family: "Mitr", sans-serif;
            transition: 0.5s;

        }

        .modify:hover {
            color: black;
            background-color: #BBFFBB;
        }
    </style>
    <div class="header">
        <p>Universidad Catolica de Santa Maria </p>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
</head>
<?php
$mysqli = new mysqli("localhost", "root","", "vida");
$salida = "";
$query = "SELECT * FROM cv ORDER By id";
if(isset($POST['consulta'])){
    $q =$mysqli ->real_escape_string($_POST['consulta']);
    $query = "SELECT id, nombre_lab, jefe_lab, fabricante, fecha_adquirida, computer, ubicacion,fecha FROM cv
    WHERE id LIKE '%".$q. "%' OR nombre_lab LIKE '%".$q."%'OR computer LIKE '%".$q."%'"; 
}
 $resultado = $mysqli->query($query);
 if($resultado->num_rows > 0){
    $salida.="<table class='tabla_datos'>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>nombre_lab</td>
                        <td>jefe_lab</td>
                        <td>fabricante</td>
                        <td>fecha_adquirida</td>
                        <td>computer</td>
                        <td>ubicacion</td>
                        <td>fecha</td>
                    </tr>
                </thead>
                <tbody>";

    while($fila = $resultado->fetch_assoc()){
        $salida.="<tr>
                <td>".$fila['id']."</td>
                <td>".$fila['nombre_lab']."</td>
                <td>".$fila['jefe_lab']."</td>
                <td>".$fila['fabricante']."</td>
                <td>".$fila['fecha_adquirida']."</td>
                <td>".$fila['computer']."</td>
                <td>".$fila['ubicacion']."</td>
                <td>".$fila['fecha']."</td>
        </tr>";
    }

    $salida.="</tbody></table>";
 }else {
    $salida.="no hay datos :'(";

 }
 echo $salida;

 ?>
 <div class="form-button">
            <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
        </div>

