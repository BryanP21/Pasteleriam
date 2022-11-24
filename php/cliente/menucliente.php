<?php
include('../../php/conexion.php');
session_start();
if(!isset($_SESSION['usuario'])){
	echo '<script> alert("Por favor debes iniciar sesión"); window.location = "../login.php"; </script>'; 
	session_destroy();
	die();
}

$cliente = "SELECT * FROM cliente";
$query = mysqli_query($link,$cliente);
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
	<body class="fondo" style="overflow-x:hidden">
					<!-- ====== -->
				    <!-- NAVBAR -->
				    <!-- ====== -->
					<nav class="navbar navbar-expand-lg sticky-top navbar-light border-bottom: 3px solid #ff6cb8!important;">
					<div class="container-fluid">			
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
				<li><a class="dropdown-item" href="../coberturas/menucobertura.php">Cobertura</a></li>
				<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../tamanos/menutamano.php">Tamaños</a></li>
                </ul>
            </li>
		      <li class="nav-item">
		        <a class="px-3 nav-link" href="#">Clientes</a>
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
</div>
<!-------------------------INICIO TABLA EMPLEADOS REGISTROS------------->
	
	<main class="frmdis6">
		<p class=Title1 style="color: white" font face="Alata" >Registro de cliente</p>
		
		<form class="formregistros"  action ="insertarcliente.php" method="POST"   >




		<input  type="hidden" name='idcliente' value="<?= $row ['idcliente']?>"/> 




			</div>
			<p class=Title2 style="color: white" font face="Alata" >Datos Personales</p>
			<div class='field'>
				<h4>Nombre</h4>
				<input name='nombre' type='text' autocomplete placeholder='Nombre' required/>
			</div>
			<div class='field'>
				<h4>Correo</h4>
				<input name='correo' type='email' autocomplete placeholder='Ej. hola@gmail.com'required />
			</div>
			<div class='field'>
				<h4>Teléfono</h4>
				<input name='telefono' type='text' autocomplete placeholder='Ej. 8447312910' required  maxlength="10"/>
			</div>
			<div class='field'>
				<h4>Apellido Paterno</h4>
				<input name='apellidopaterno' type='text' autocomplete placeholder='Apellido Paterno' required/>
			</div>
			<div class='field'>
				<h4>Apellido Materno</h4>
				<input name='apellidomaterno' type='text' autocomplete placeholder='Apellido Materno' required/>
			</div>

			<div >
				
			<input 				class="submitbutton" 
								type="submit"
								value="Agregar"
								
								
						>
			</div>
		</form>
	</main>
   <div class="ajustador"><p class=Title5 style="color: white" font face="Alata" >Consulta de clientes</p></div>
    <div class="users-table2" >
       
        <table style="border: 6px solid #ee69c6;">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Estatus</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
			
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
					<?php if($row['idstatus'] == '1'){ ?>
                    <tr>
                        
                        <th><?= $row['nombre'] ?></th>
                        <th><?= $row['apellidopaterno'] ?></th>
                        <th><?= $row['apellidomaterno'] ?></th>
                        <th><?= $row['correo'] ?></th>
                        <th><?= $row['telefono'] ?></th>
						        
					<?php if($row['idstatus'] == '1'){ ?> 
							<th>Activo</th>
						<?php } ?>
					
                        <th><a href="updatecliente.php?idcliente=<?= $row['idcliente'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="eliminacliente.php?idcliente=<?= $row['idcliente'] ?>" class="users-table--delete" >Eliminar</a></th>
						
                    </tr>
					<?php	} ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
	
	 <!-- Option 1: Bootstrap Bundle with Popper -->
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
		
  </body>
</html>

