<?php
session_start();
require_once "Database/Database.php";
require_once "Database/Databasecv.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];

if (isset($_GET['id'])) {
    $idact = $_GET['id'];
    $sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";

    $$sql_fetch_todos_cv = "SELECT * FROM cv WHERE id='".mysql_real_escape_string($idact)."'";

    $sql_fetch_todos_activi = "SELECT * FROM vida_actividades WHERE id_cv=''";
    $query = mysqli_query($conn, $sql_fetch_todos);
    2
    $querycv = mysqli_query($conna, $sql_fetch_todos_cv);
    $queryact = mysqli_query($conna, $sql_fetch_todos_activi);
    $rowcv = mysqli_fetch_array($querycv);
    $rowacti = mysqli_fetch_array($queryact);

}
else {
     echo "The request is not working";
 }
?>
<script>
</script>


<!doctype html>
<html lang="en">

<head>
    <title>Editar Computadora</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        /*table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }
        
        table {
            width: 100%;
        }
        

        /*th {
            color: white;
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
        .form-group{
            margin-left: 600px;
        }
        [type=text]{
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: transparent;
            padding: 7px 200px 7px 5px;
        }
        .return{
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;
        }
        .return:hover{
            background-color: #fdb515;
            color: white;
        }
        .modify{
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
        .modify:hover{
            color: black;
            background-color: #BBFFBB;
        }*/
    </style>
</head>
<body>
    <div class="header">
        <h3>Universidad Catolica de Santa Maria</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Hoja de Vida</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-success">
        <table class="table table-dark table-bordered border-primary">
            <thead >
                <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID: Computadora</th>
                <th scope="col">Nombre: Computadora</th>
                <th scope="col">Año</th>
                <th scope="col">Fecha: Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['proname'] ?></td>
                        <td><?php echo $row['amount'] ?></td>
                        <td class="timeregis"><?php echo $row['time'] ?></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
    </div>
    <div class="fixproduct">
        <form method="POST" action="main/fixcv.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre del laboratorio</label>
                <br>
                <input type="text" class="form-control" name="nombre_lab" value="<?php echo $rowcv['nombre_lab']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jefe de laboratorio</label>
                <br>
                <input type="text" value="<?php echo $rowcv['jefe_lab'] ?>" class="form-control" name="jefe_lab" required>
            
                <input type="hidden" value="<?php echo $rowcv['id'] ?>" name="id" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Fabricante</label>
                <br>
                <input type="text" class="form-control" name="fabricante" value="<?php echo $rowcv['fabricante']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Fecha Adquirida</label>
                <br>
                <input type="number" class="form-control" name="fecha_adquirida" min="2000" max="2100" value="<?php echo $rowcv['fecha_adquirida']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Computadora</label>
                <br>
                <input type="text" class="form-control" name="computer" value="<?php echo $rowcv['computer']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ubicación</label>
                <br>
                <input type="text" class="form-control" name="ubicacion" value="<?php echo $rowcv['ubicacion']; ?>" required>
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="modify" style="float:right">Editar</button>
                <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
            </div>
            <br><br>
        </form>
    </div>
    <div class="table-success">
        <div class="row g-3">
  
            <div class="input-group mb-3">
                <div class="col-4">
                    <input type="text" placeholder="Accion" class="form-control">
                </div> 
                <div class="col">
                    <input type="text" placeholder="Responsable" class="form-control">
                </div> 
                <div class="col">
                    <input type="date" class="form-control" placeholder="Fecha"  aria-describedby="button-addon2">
                </div> 
                <div class="col">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                </div>    
            </div>
        </div>
        <br>
        <table id="tablaActividades" class="table table-dark table-bordered border-primary">
            <thead >
                <tr>
                <th scope="col">Accion</th>
                <th scope="col">Responsable</th>
                <th scope="col">Fecha realizada</th>
                <th scope="col">Editar </th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($queryact)) {
                    $sql_fetc = "SELECT * FROM actividades WHERE id='".$row['id_actividad']."'";
                    $quer = mysqli_query($conna, $sql_fetc); 
                    $roro =mysqli_fetch_array($quer)?>
                    <tr>
                        <td><?php echo $roro['accion'] ?></td>
                        <td><?php echo $roro['responsable'] ?></td>
                        <td><?php echo $roro['fecha_realizada'] ?></td>
                        
                            <!--<button type="button" name="edit"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Editar
                            </button>-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar actividad</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label text-primary">ACCION </label>
                                                <br><br>
                                                <input type="text" class="form-control" id="accion-name" value="<?php echo $roro['accion'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label text-primary">RESPONSABLE</label>
                                                <input type="text" class="form-control" id="responsable-name"value="<?php echo $roro['responsable'] ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label text-primary">FECHA REALIZADA</label>
                                                <input type="date" class="form-control" id="Fecha-name" value="<?php echo $roro['fecha_realizada'] ?>" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-primary">Guardar todos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
                        
                        
                        <!--<td class="delete"><a name="dele" id="" class="bdelete" href="main/deletecv.php?id=<?php echo $row['id'] ?>" role="button">
                            Eliminar
                        </a></td>-->
                        
                    </tr>
                <?php
                    $idpro++;
                } ?>
                
            </tbody>
        </table>
        <br>
    </div>            
    <!--<div class="fixproduct">
        <form method="POST" action="main/cambio.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre del Computadora</label>
                <br>
                <input type="text" class="form-control" name="name" value="<?php echo $_GET['message']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Año de Adquisicion</label>
                <br>
                <input type="text" value="<?php echo $_GET['amount'] ?>" class="form-control" name="value" required>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="modify" style="float:right">Editar</button>
                <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
            </div>
        </form>
    </div>-->
    <?php
    mysqli_close($conn);
    mysqli_close($conna);
    ?>
    <script type="text/javascript" src="main.js"></script> 
</body>
</html>