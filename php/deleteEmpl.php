<?php
	
	require "../conexion.php";
	
	if($_POST){
		
        $id = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['id']);
		

		$sql = "DELETE FROM pgfacture_mark.usuarios WHERE id = $id;";
	
		if($result=$mysqli->query($sql)){     
            echo $result;
		} 
		
	}
	
	
	
?>