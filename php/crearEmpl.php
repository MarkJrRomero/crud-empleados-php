<?php
	
	require "../conexion.php";
	
	if($_POST){
		$count = 1000;
        $usuario = str_replace(array("#", "'", ";", "|", "-"), '', $_POST['user']);
		$password = str_replace(array("#", "'", ";", "|", "-"), '', $_POST['pass']);
		$nombre = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['nombre']);
		$tipo_usuario = 2;
        $cedula = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['cedula']);
		$fecha_nacimiento = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['date']);
        $email = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['email']);
		$telefono = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['telefono']);

		$sql = "INSERT INTO pgfacture_mark.usuarios
        (usuario, password, nombre, tipo_usuario, cedula, fecha_nacimiento, email, telefono)
        VALUES 
            ('$usuario', '$password', '$nombre', $tipo_usuario , '$cedula', '$fecha_nacimiento' , '$email', $telefono);";
	
		if($result=$mysqli->query($sql)){     
            echo "<script type='text/javascript'>
                alert('Usuario creado correctamente!');
                window.location= '../pages/crearEmpl.php'
                </script>";
		} else {
			echo "<script type='text/javascript'>
				alert('Error al guardar el empleado! error: $result');
				window.location= '../pages/crearEmpl.php'
				</script>";
		}
		
		
		
	}
	
	
	
?>