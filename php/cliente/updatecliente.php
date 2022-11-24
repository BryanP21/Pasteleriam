<?php 

   include ('../../php/conexion.php');
   session_start();
   if(!isset($_SESSION['usuario'])){
	echo '<script> alert("Por favor debes iniciar sesión"); window.location = "../login.php"; </script>'; 
	session_destroy();
	die();
}
   $link= mysqli_connect($host,$dbuser,$dbpass,$db);
    $id=$_GET['idcliente'];

    $sql="SELECT * FROM cliente WHERE idcliente='$id'";
    $query=mysqli_query($link, $sql);

    $row=mysqli_fetch_array($query);
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
<!-------------------------INICIO TABLA ------------>

	
	<main class="frmdis2">
		<p class=Title1 style="color: white" font face="Alata" >Modificación de cliente</p>
		
		<form class="formregistros"  action ="editacliente.php" method="POST">

		<input  type="hidden" name='idcliente' value="<?= $row ['idcliente']?>"/> 

			<div class='field4'>
			<h4>Estatus</h4>
			<select name="idstatus" required placeholder='Estatus' required  value="<?= $row['idstatus']?>" >
					<option selected disabled></option>
					<option value="1">Activo</option>
					<option value="2">Inactivo</option>
				</select>
			</div>   
			<p class=Title2 style="color: white" font face="Alata" >Datos Personales</p>
			<div class='field'>
				<h4>Nombre</h4>
				<input type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre']?>"/>
			</div>
			<div class='field'>
				<h4>Apellido Paterno</h4>
				<input type="text" name="apellidopaterno" placeholder="Apellido Paterno" value="<?= $row['apellidopaterno']?>"/>
			</div>
			<div class='field'>
				<h4>Apellido Materno</h4>
				<input type="text" name="apellidomaterno" placeholder="Apellido Materno" value="<?= $row['apellidomaterno']?>"/>
			</div>
			<div class='field'>
				<h4>Correo</h4>
				<input type="email" name="correo" placeholder="Correo" value="<?= $row['correo']?>"/>
			</div>
			<div class='field'>
				<h4>Teléfono</h4>
				<input type="text" name="telefono" placeholder="Telefono" value="<?= $row['telefono']?>"/>
			</div>

			<div >
				
			<input 				class="submitbutton" 
								type="submit"
								value="Actualizar"
								
								
						>
			</div>
		</form>
	</main>

	
	 <!-- Option 1: Bootstrap Bundle with Popper -->
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

