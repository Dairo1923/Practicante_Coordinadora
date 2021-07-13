<?php
	
	try{ 
	
		$Id=$_GET["ID"];
		
		$base=new PDO('mysql:host=localhost; dbname=sistema_bonificacion', 'root', '');

		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
		$base->exec("SET CHARACTER SET utf8");
		
	
		
		$sql="DELETE FROM premios WHERE ID_prem=:valor";
		
		
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":valor"=>$Id));
		
		
		header("Location:empresa_CRUD.php");
		}catch(Exception $e){
		
			die('Error' . $e->getMessage());
		
		
	}finally{
		
		$base=null;
		
	}
	

	
	?>