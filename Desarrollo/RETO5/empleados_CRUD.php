<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reto 5</title>
</head>

<body>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	


</head>


<?php require("navegacion.php")?>
<?php
	
	// ver los registros 
	require("conexion.php");

	$conexion= $base->query("SELECT * FROM empleados");
	
	//manejamos un array de objetos 
	//%registro= un array de objetos 
	$registro=$conexion->fetchAll(PDO::FETCH_OBJ);
	
  //ingresar registros 

if (isset($_POST['cr'])) {
    $Id=$_POST['ID'];
    $Nom=$_POST['Nom'];
    $Carg=$_POST['Carg'];
    $Suel=$_POST['Suel'];
    $Id_pre=$_POST['Id_pre'];
    $Id_punt=$_POST['Id_punt'];

    $sql="INSERT INTO empleados (ID_empleado, Nombre, Cargo, Sueldo, Id_premio, Id_puntaje) VALUES (:id, :nom, :carg, :suel, :idPremio, :idPuntaje)";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":id"=>$Id, ":nom"=> $Nom , ":carg" => $Carg, ":suel" => $Suel, ":idPremio" => $Id_pre, ":idPuntaje" => $Id_punt));

    header("Location:empleados_CRUD.php");
}
	
	?>

<div class="container">
<div class="col">
    <h1><span class="subtitulo" align="center">Empleados</span></h1>
    <form  method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table id="tabla" class="table" style="width:100%"  align="center">
        <thead class="thead-dark">
            <tr >
                <td>ID_empleado</td>
                <td>Nombre</td>
                <td>Cargo</td>
                <td>Sueldo</td>
                <td>Id_premio</td>
                <td>Id_puntaje</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

            </tr> 
        </thead>


        <tbody>
        <?php
        
        foreach($registro as $empleado):
        
        
        ?>	
            <tr>
                <td><?php echo $empleado->ID_empleado?> </td>
                <td><?php echo $empleado->Nombre?></td>
                <td><?php echo $empleado->Cargo?></td>
                <td><?php echo $empleado->Sueldo?></td>
                <td><?php echo $empleado->Id_premio?></td>
                <td><?php echo $empleado->Id_puntaje?></td>
        <!--pasamos atrabes de un enlace el id del objeto persona, al pulsar en el boton borrar le pasamos el objeto id y vamos a la pagina eliminar-->
                <td class="bot"><a href="eliminar_empleados.php?ID=<?php echo $empleado->ID_empleado?>"><input type='button' name='del' id='del' value='Borrar' class="btn btn-danger"></a></td>
                
                <td><a href="editar_empleados.php?ID=<?php  echo $empleado->ID_empleado?> 
                & Nom=<?php  echo $empleado->Nombre?> 
                & Carg=<?php  echo $empleado->Cargo?> 
                & Suel=<?php  echo $empleado->Sueldo?>
                & Id_pre=<?php  echo $empleado->Id_premio?> 
                & Id_punt=<?php  echo $empleado->Id_puntaje?>">
                    <input type='button' name='up' id='up' value='Actualizar'  class="btn btn-warning"></a></td>
                    </tr>       
            <tr>
            
				<?php
				
				//cerrar el foreach
				endforeach;
				?>
                <td><input type='hidden' name='ID' size='10'></td>
                <td><input type='text' name='Nom' size='10'></td>
                <td><input type='text' name='Carg' size='10'></td>
                <td><input type='text' name='Suel' size='10'></td>
                <td><input type='text' name='Id_pre' size='10'></td>
                <td><input type='text' name='Id_punt' size='10'></td>
                <td ><input type='submit' name='cr' id='cr' value='Insertar' class='btn btn-primary'></td>
            </tr> 
        </tbody>   
    </table>
    </form>
</div>
</div>
    <p>&nbsp;</p>
</body>
</html>