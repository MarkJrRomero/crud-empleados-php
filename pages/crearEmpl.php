<?php
	
	session_start();
	require '../conexion.php';

	if(!isset($_SESSION['id'])){
		header("Location: ../index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
		
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

      
                        <form method="POST" action="../php/crearEmpl.php">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input required type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
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
                                <input required type="email" class="form-control" id="email" name='email'>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input required type="number" class="form-control" id="telefono" name='telefono'>
                            </div>

                            <div class="form-group">
                                <label for="user">Usuario de ingreso:</label>
                                <input required type="text" class="form-control" id="user" name='user'>
                            </div>

                            <div class="form-group">
                                <label for="pass">Contraseña de ingreso:</label>
                                <input required type="password" class="form-control" id="pass" name='pass'>
                            </div>
                            
                            <button type="submit" class="btn btn-dark">Crear Empleado</button>
                        </form>
                

                 

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

      

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
	</body>
</html>
