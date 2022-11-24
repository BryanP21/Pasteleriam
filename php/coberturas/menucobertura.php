<?php
include ('../../php/conexion.php');
session_start();
if(!isset($_SESSION['usuario'])){
	echo '<script> alert("Por favor debes iniciar sesión"); window.location = "../login.php"; </script>'; 
	session_destroy();
	die();
}
$cobertura = "SELECT * FROM cobertura";
$query = mysqli_query($link,$cobertura);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../main.css">
	<link type="text/css" href="../style.css" rel="stylesheet">

    <title>Maria´s Pastelería</title>
	<link rel="icon" href="../../img/logos/Logos-MP-2021-02-02-06.ico">
  </head>
  <body class="fondo">

  <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light border-bottom px-3">
		 	<a class="navbar-brand" href="../../menuprincipal/index.php">
		    	<img src="../../img/logos/logos formato-08-A.png" width="150px" height="50px" class="d-inline-block" alt="">
		  	</a>
		  	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      		<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="px-4 fs-4 navbar-nav navbar-text">
		      <li class="nav-item active">
		        <a class="px-3 nav-link " href="../../pedidos/pedidos.php">Pedidos</a>
		      </li>
		      <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Productos</a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../rellenos/menurelleno.php">Rellenos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../sabores/menusabor.php">Sabores</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../tamanos/menutamano.php">Tamaños</a></li>
                </ul>
            </li>
		      <li class="nav-item">
		        <a class="px-3 nav-link" href="../cliente/menucliente.php">Clientes</a>
		      </li>
		      <li class="nav-item">
		        <a class="px-3 nav-link" href="../menuempleado.php">Empleados</a>
		      </li>
		      <li class="px-3 nav-item">
		        <a class="nav-link" href="../../agenda/index.php">Agenda</a>
		      </li>
		    </ul>
		  </div>
		  <form action="../logout.php" class="frmut" >
        <div class="text-end margenLgOut">
            <button type="submit" class="btn btn-primary"  >Logout</button>
        </div>
        </form>
		</nav>

<!-------------------------INICIO TABLA COBERTURAS registos------------->

		
	
<main class="frmdis3">
	<p class=Title1 style="color: white" font face="Alata" >Registro de cobertura</p>
		
		<form class="formregistros2"  action ="insertarcobertura.php" method="POST"   >

			<div class='field'>
				<h4>Descripcion</h4>
				<input name='descripcion' type='name' placeholder='------' autocomplete required/>
			</div>
			

			<div >
				
			
				
			<input 				class="submitbutton" 
								type="submit"
								value="Agregar"
								
								
						>
     		</div>
		</form>
	</main>

    <div class="users-table">
	<p class=Title5 style="color: white" font face="Alata" >Consulta de coberturas</p>
		
        <table style="border: 6px solid #ee69c6;">
            <thead>
                <tr>
                    <th>Descripcion</th>
					<th>Estatus</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
					<?php if($row['idstatus'] == '1'){ ?>
                    <tr>
                        
                        <th><?= $row['descripcion'] ?></th>

						<?php if($row['idstatus'] == '1'){ ?> 
							<th>Activo</th>
						<?php } ?>

                        <th><a href="updatecobertura.php?idcobertura=<?= $row['idcobertura'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="eliminarcobertura.php?idcobertura=<?= $row['idcobertura'] ?>" class="users-table--delete" >Eliminar</a></th>
						<script src="../js/confirmacion.js"></script>
                    </tr>
					<?php	} ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>



