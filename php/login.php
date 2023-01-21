<?php
	
	require "../conexion.php";
	
	session_start();
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$sql = "SELECT id, password, nombre, tipo_usuario FROM pgfacture_mark.usuarios WHERE usuario='$usuario';";
		// echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = trim($row['password']);
			
			$pass_c = trim($password);
			// echo $password_bd;
			// echo $pass_c;
			if($password_bd == $pass_c){
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
				
				header("Location: ../principal.php");
				
			} else {
			
				echo "<script type='text/javascript'>
				alert('La contraseña no coincide!');
                window.location= '../index.html'
				</script>";
			
			}
			
			
			} else {
				echo "<script type='text/javascript'>
					  alert('No existe el usuario!');
                      window.location= '../index.html'
				      </script>";
		}
		
		
		
	}
	
	
	
?>