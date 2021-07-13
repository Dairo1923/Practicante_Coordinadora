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
        $cant=trim($_GET["Cant"]);
        $valor=trim($_GET["Valor"]);
        $categ=trim($_GET["Categ"]);

        // si sí puksó el boton de actualizar
        } else {
            $Id=$_POST["id"];
            $Nom=$_POST["Nom"];
            $Cant=$_POST["Cant"];
            $Valor=$_POST["Valor"];
            $Categ=$_POST["Categ"];

            $sql="UPDATE premios SET ID_prem=:miIdPrem, Nombre=:miNom, Cant_puntos=:miCant, Valor=:miValor, Categoria=:miCateg WHERE ID_prem=:miIdPrem";

            $result=$base->prepare($sql);

            $result->execute(array(":miIdPrem"=>$Id,":miNom"=>$Nom, ":miCant"=>$Cant, ":miValor"=>$Valor, ":miCateg"=>$Categ));

            header("Location:premio_CRUD.php");
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
            <input type="text"  name="Cant" value="<?php echo $cant; ?>"><br>
                
            <label>SUELDO:</label>
            <input type="text"  name="Valor" value="<?php echo $valor; ?>"><br>
            
            <label>CATEGORÍA:</label>
            <input type="text"  name="Categ" value="<?php echo $categ; ?>"><br>

            <br>
            <input type="submit"  value="Modificar" name="bot_actualizar"><br>
        </form>
        <p>&nbsp;</p>
    </body>
</html>