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

	$conexion= $base->query("SELECT * FROM premios");
	
	//manejamos un array de objetos 
	//%registro= un array de objetos 
	$registro=$conexion->fetchAll(PDO::FETCH_OBJ);
	
  //ingresar registros 

if (isset($_POST['cr'])) {
    $Id=$_POST['ID_pre'];
    $Nom=$_POST['Nom'];
    $Cant=$_POST['Cant'];
    $Valor=$_POST['Valor'];
    $Categ=$_POST['Categ'];

    $sql="INSERT INTO premios (ID_prem, Nombre, Cant_puntos, Valor, Categoria) VALUES (:id, :nom, :cant, :valor, :categ)";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":id"=>$Id, ":nom"=> $Nom , ":cant" => $Cant, ":valor" => $Valor, ":categ" => $Categ));

    header("Location:premio_CRUD.php");
}
	
	?>

<div class="container">
<div class="col">
    <h1><span class="subtitulo" align="center">Empleados</span></h1>
    <form  method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table id="tabla" class="table" style="width:100%"  align="center">
        <thead class="thead-dark">
            <tr >
                <td>ID</td>
                <td>Nombre</td>
                <td>Cant_puntos</td>
                <td>Valor</td>
                <td>Categoría</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

            </tr> 
        </thead>


        <tbody>
        <?php
        
        foreach($registro as $premio):
        
        
        ?>	
            <tr>
                <td><?php echo $premio->ID_prem?> </td>
                <td><?php echo $premio->Nombre?></td>
                <td><?php echo $premio->Cant_puntos?></td>
                <td><?php echo $premio->Valor?></td>
                <td><?php echo $premio->Categoria?></td>
        <!--pasamos atrabes de un enlace el id del objeto persona, al pulsar en el boton borrar le pasamos el objeto id y vamos a la pagina eliminar-->
                <td class="bot"><a href="eliminar_premio.php?ID=<?php echo $premio->ID_prem?>"><input type='button' name='del' id='del' value='Borrar' class="btn btn-danger"></a></td>
                
                <td><a href="editar_premio.php?ID=<?php  echo $premio->ID_prem?> 
                & Nom=<?php  echo $premio->Nombre?> 
                & Cant=<?php  echo $premio->Cant_puntos?> 
                & Valor=<?php  echo $premio->Valor?>
                & Categ=<?php  echo $premio->Categoria?>"> 
                <input type='button' name='up' id='up' value='Actualizar'  class="btn btn-warning"></a></td>
                    </tr>       
            <tr>
            
				<?php
				//cerrar el foreach
				endforeach;
				?>
                <td><input type='hidden' name='ID_pre' size='10'></td>
                <td><input type='text' name='Nom' size='10'></td>
                <td><input type='text' name='Cant' size='10'></td>
                <td><input type='text' name='Valor' size='10'></td>
                <td><input type='text' name='Categ' size='10'></td>
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