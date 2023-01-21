<?php
	
	require "../conexion.php";
	
	if($_POST){
        $id = str_replace(array("#", "'", ";", "|", "-"), '', $_POST['idUser']);
        $usuario = str_replace(array("#", "'", ";", "|", "-"), '', $_POST['user']);
		$password = str_replace(array("#", "'", ";", "|", "-"), '', $_POST['pass']);
		$nombre = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['nombre']);
		$tipo_usuario = 2;
        $cedula = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['cedula']);
		$fecha_nacimiento = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['date']);
        $email = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['email']);
		$telefono = str_replace(array("#", "'", ";", "|", "-"), '',$_POST['telefono']);

		$sql = "UPDATE pgfacture_mark.usuarios
            SET
                usuario = '$usuario',
                password = '$password',
                nombre = '$nombre',
                cedula = '$cedula',
                fecha_nacimiento = '$fecha_nacimiento',
                email = '$email',
                telefono = $telefono
            WHERE id = $id;";

        // echo $sql;
	
		if($result=$mysqli->query($sql)){     
            echo "<script type='text/javascript'>
                alert('Empleado actualizado correctamente!');
                window.location= '../pages/listEmpl.php'
                </script>";
		} else {
			echo "<script type='text/javascript'>
				alert('Error al actualizar el empleado! error: $result');
				window.location= '../pages/listEmpl.php'
				</script>";
		}
		
		
		
	}
	
	
	
?>