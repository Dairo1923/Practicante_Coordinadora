<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reto 5</title>
<link rel="stylesheet" href="css/login.css?v=<?php echo(rand()); ?>" />
</head>

<body>

<?php

include("conexion.php");
// si no pulsó  en el boton de actualizar 
if (!isset($_POST['bot_actualizar'])) {

//guardat en variables los datos que 
$id=trim($_GET["ID"]);
$nom=trim($_GET["Nom"]);
$carg=trim($_GET["Carg"]);
$suel=trim($_GET["Suel"]);
$id_pre=trim($_GET["Id_pre"]);
$id_punt=trim($_GET["Id_punt"]);

// si sí puksó el boton de actualizar
} else {
    $Id=$_POST["id"];
    $Nom=$_POST["Nom"];
    $Carg=$_POST["Carg"];
    $Suel=$_POST["Suel"];
    $ID_pre=$_POST["Id_pre"];
    $ID_punt=$_POST["Id_punt"];

    $sql="UPDATE empleados SET ID_empleado=:miId, Nombre=:miNom, Cargo=:miCarg, Sueldo=:miSuel, Id_premio=:miIdpre, ID_puntaje=:miIdpunt WHERE ID_empleado=:miId";

    $result=$base->prepare($sql);

    $result->execute(array(":miId"=>$Id,":miNom"=>$Nom, ":miCarg"=>$Carg, ":miSuel"=>$Suel, ":miIdpre"=>$ID_pre, ":miIdpunt"=>$ID_punt));

    header("Location:empleados_CRUD.php");
    }
    ?>
    <p>

    </p>
    <p>&nbsp;</p>

    <!--funcion $_SERVER-->
<form name="form1" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">

    <h1>ACTUALIZAR</h1>
    
    <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        
    <label>NOMBRE:</label>
    <input type="text" name="Nom" value="<?php echo $nom; ?>"><br>
        
    <label>CARGO:</label>
    <input type="text"  name="Carg" value="<?php echo $carg; ?>"><br>
        
    <label>SUELDO:</label>
    <input type="text"  name="Suel" value="<?php echo $suel; ?>"><br>
    
    <input type="hidden"  name="Id_pre" value="<?php echo $id_pre; ?>"><br>

    <input type="hidden"  name="Id_punt" value="<?php echo $id_punt; ?>"><br>
    <br>
    <input type="submit"  value="Modificar" name="bot_actualizar"><br>
</form>
<p>&nbsp;</p>
</body>
</html>