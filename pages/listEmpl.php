<?php
	session_start();
	require '../conexion.php';
	
	if(!isset($_SESSION['id'])){
		header("Location: index.html");
	}
	
	$id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	
	if($tipo_usuario == 1){
		$where = "";
		} else if($tipo_usuario == 2){
		$where = "WHERE id=$id";
	}
	
	$sql = "SELECT * FROM usuarios $where";
	$resultado = $mysqli->query($sql);
	
	
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Web</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
        <script
        src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>      

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Sistema Web</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="../logout.php">Salir</a>
					</div>
				</li>
			</ul>
		</nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../principal.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Inicio
                            </a>
							
							<?php if($tipo_usuario == 1) { ?>
								
								<div class="sb-sidenav-menu-heading">CRUD</div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                        Empleados
                                        <div class="sb-sidenav-collapse-arrow">
                                            <i class="fas fa-angle-down"></i>
                                        </div>
                                    </a>
									<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
										<nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="crearEmpl.php">Creacion</a>
                                        <a class="nav-link" href="listEmpl.php">Lista usuarios</a>
                                        </nav>
									</div>

										
							<?php } ?>
							
							
					</div>
				</nav>
			</div>
            <div id="layoutSidenav_content">
                    <main style="margin: 50px;">
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Lista de empleados</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered tablesorter" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Cedula</th>
                                                    <th>Fecha de Nacimiento</th>
                                                    <th>Email</th>
                                                    <th>Telefono</th>
                                                    <th>Tipo Usuario</th>
                                                    <th>Usuario</th>
                                                    <th>Password</th>

                                                    <th>EDIT</th>
                                                    <th>DELETE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($row = $resultado->fetch_assoc()) { ?>
                                                    
                                                    <tr>
                                                        
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['nombre']; ?></td>
                                                        <td><?php echo $row['cedula']; ?></td>
                                                        <td><?php echo $row['fecha_nacimiento']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['telefono']; ?></td>
                                                        <td><?php echo $row['tipo_usuario']; ?></td>
                                                        <td><?php echo $row['usuario']; ?></td>
                                                        <td><?php echo $row['password']; ?></td>
                                                        
                                                        <td><?php echo "<button onclick=\"editEmplado(".$row['id'].",'".$row['nombre']."','".$row['cedula']."','".$row['fecha_nacimiento']."','".$row['email']."',
                                                        '".$row['telefono']."','".$row['usuario']."','".$row['password']."')\" type='button' class='btn btn-primary'>E</button>" ?></td>
                                                        
                                                        
                                                        <td><?php echo "<button onclick='deleteEmpleado(".$row['id'].")' type='button' class='btn btn-danger'>D</button>" ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
						    </div>
				    </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Mark Romero 2023</div>
						</div>
					</div>
				</footer>
			</div>
		</div>

        <script>
            function deleteEmpleado(id){
                $.ajax({
                method: "POST",
                url: "../php/deleteEmpl.php",
                data: {id}
                }).done(function( response ) {
                    if(response == 1){
                        alert('Se elimino el empleado correctamente!');
                        location.reload();
                    }else{
                        alert('Error al eliminar el empleado!');
                        location.reload();
                    }
                });
            }
         
            function editEmplado(id, nombre, cedula, fecha_nacimiento, email, telefono, usuario, password){
                $('#idUser').val(id);
                $('#nombre').val(nombre);
                $('#cedula').val(cedula);
                $('#date').val(fecha_nacimiento);
                $('#email').val(email);
                $('#telefono').val(telefono);
                $('#user').val(usuario);
                $('#pass').val(password);
                $('#modalUpdate').modal('show');
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="application/javascript" src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>


    <!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form method="POST" action="../php/updateEmpl.php">
                            <div class="form-group" style="display: none;">
                                <label for="id">Id:</label>
                                <input required type="text" class="form-control" id="idUser" name="idUser">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input required maxlength="50" type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cedula:</label>
                                <input required type="number" class="form-control" id="cedula" name='cedula'>
                            </div>
                            <div class="form-group">
                                <label for="date">Fecha Nacimiento:</label>
                                <input required type="date" class="form-control" id="date" name='date'>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input required maxlength="50" type="email" class="form-control" id="email" name='email'>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input required type="number" class="form-control" id="telefono" name='telefono'>
                            </div>

                            <div class="form-group">
                                <label for="user">Usuario de ingreso:</label>
                                <input required maxlength="20" type="text" class="form-control" id="user" name='user'>
                            </div>

                            <div class="form-group">
                                <label for="pass">Contraseña de ingreso:</label>
                                <input required maxlength="20" type="password" class="form-control" id="pass" name='pass'>
                            </div>
                            
                            <button type="submit" class="btn btn-dark">Actualizar Empleado</button>
                        </form>
      </div>
    </div>
  </div>
</div>

</html>
