<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $num1=$_GET["num1"];
        $n=1;
        $ele1=$_GET["Ele1"];
        $ele2=$_GET["Ele2"];
        $ele3=$_GET["Ele3"];
        $ele4=$_GET["Ele4"];
        $ele5=$_GET["Ele5"];
        $ele6=$_GET["Ele6"];
        $ele7=$_GET["Ele7"];
        $ele8=$_GET["Ele8"];
        $ele9=$_GET["Ele9"];
        $ele10=$_GET["Ele10"];
        $ele11=$_GET["Ele11"];
        $ele12=$_GET["Ele12"];
        $ele13=$_GET["Ele13"];
        $ele14=$_GET["Ele14"];
        $ele15=$_GET["Ele15"];

        $vector1=array($ele1,$ele2,$ele3,$ele4,$ele5,$ele6,$ele7,$ele8,$ele9,$ele10,$ele11,$ele12,$ele13,$ele14,$ele15);

        for ($num=0; $num < $num1; $num++) { 
            
            echo $n . ") El recorrido es" . " " . $vector1[$num] . "<br>";
            $n++;
        }

        
    

    ?>
</body>
</html>