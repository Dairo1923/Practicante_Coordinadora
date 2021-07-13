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
        $puntos=trim($_GET["puntos"]);
        $rankPer=trim($_GET["rankPer"]);
        $rankGlo=trim($_GET["rankGlo"]);

        // si sí puksó el boton de actualizar
        } else {
            $Id=$_POST["id"];
            $Puntos=$_POST["Puntos"];
            $RankPer=$_POST["rankPer"];
            $RankGlo=$_POST["rankGlo"];

            $sql="UPDATE puntajes SET ID_puntaje=:miIdPunt, puntos_obtenidos=:miPuntos, ranking_personal=:miRankPer, ranking_global=:miRankGlo WHERE ID_puntaje=:miIdPunt";

            $result=$base->prepare($sql);

            $result->execute(array(":miIdPunt"=>$Id,":miPuntos"=>$Puntos, ":miRankPer"=>$RankPer, ":miRankGlo"=>$RankGlo));

            header("Location:puntaje_CRUD.php");
            }
            ?>
            <p>

            </p>
            <p>&nbsp;</p>

            <!--funcion $_SERVER-->
        <form name="form1" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">

            <h1>ACTUALIZAR</h1>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
                
            <label>PUNTOS OBTENIDOS:</label>
            <input type="text" name="Puntos" value="<?php echo $puntos; ?>"><br>
                
            <label>RANKING PERSONAL:</label>
            <input type="text"  name="rankPer" value="<?php echo $rankPer; ?>"><br>
                
            <label>RANKING GLOBAL:</label>
            <input type="text"  name="rankGlo" value="<?php echo $rankGlo; ?>"><br>
            

            <br>
            <input type="submit"  value="Modificar" name="bot_actualizar"><br>
        </form>
        <p>&nbsp;</p>
    </body>
</html>