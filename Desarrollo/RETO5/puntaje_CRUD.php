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

	$conexion= $base->query("SELECT * FROM puntajes");
	
	//manejamos un array de objetos 
	//%registro= un array de objetos 
	$registro=$conexion->fetchAll(PDO::FETCH_OBJ);
	
  //ingresar registros 

if (isset($_POST['cr'])) {
    $Id=$_POST['ID_punt'];
    $punt=$_POST['puntos'];
    $rankPer=$_POST['rankPer'];
    $rankGlo=$_POST['rankGlo'];

    $sql="INSERT INTO puntajes (ID_puntaje, puntos_obtenidos, ranking_personal, ranking_global) VALUES (:id, :punt, :rankPer, :rankGlo)";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":id"=>$Id, ":punt"=> $punt , ":rankPer" => $rankPer, ":rankGlo" => $rankGlo));

    header("Location:puntaje_CRUD.php");
}
	
	?>

<div class="container">
<div class="col">
    <h1><span class="subtitulo" align="center">Empleados</span></h1>
    <form  method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table id="tabla" class="table" style="width:100%"  align="center">
        <thead class="thead-dark">
            <tr >
                <td>ID puntaje</td>
                <td>Puntos obtenidos</td>
                <td>Ranking personal</td>
                <td>Ranking global</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

            </tr> 
        </thead>


        <tbody>
        <?php
        
        foreach($registro as $puntos):
        
        
        ?>	
            <tr>
                <td><?php echo $puntos->ID_puntaje?> </td>
                <td><?php echo $puntos->puntos_obtenidos?></td>
                <td><?php echo $puntos->ranking_personal?></td>
                <td><?php echo $puntos->ranking_global?></td>
        <!--pasamos atrabes de un enlace el id del objeto persona, al pulsar en el boton borrar le pasamos el objeto id y vamos a la pagina eliminar-->
                <td class="bot"><a href="eliminar_puntaje.php?ID=<?php echo $puntos->ID_puntaje?>"><input type='button' name='del' id='del' value='Borrar' class="btn btn-danger"></a></td>
                
                <td><a href="editar_puntaje.php?ID=<?php  echo $puntos->ID_puntaje?> 
                & puntos=<?php  echo $puntos->puntos_obtenidos?> 
                & rankPer=<?php  echo $puntos->ranking_personal?> 
                & rankGlo=<?php  echo $puntos->ranking_global?>"> 
                <input type='button' name='up' id='up' value='Actualizar'  class="btn btn-warning"></a></td>
                    </tr>       
            <tr>
            
				<?php
				//cerrar el foreach
				endforeach;
				?>
                <td><input type='hidden' name='ID_punt' size='10'></td>
                <td><input type='text' name='puntos' size='10'></td>
                <td><input type='text' name='rankPer' size='10'></td>
                <td><input type='text' name='rankGlo' size='10'></td>
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