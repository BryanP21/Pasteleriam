<?php



    if(isset($_REQUEST['btnlogin'])){
		include_once 'conexion.php';
		session_start();

		
		$usuario = strtolower($_REQUEST['usuario']??'');
		$contrasena = $_REQUEST['contrasena']??'';
        
		//$usr= mb_strtoupper($usuario, 'UTF-8');
		//$usuario = strtoupper($usuario);
		$sql= "SELECT * from empleado where usuario= '$usuario'";
	

		$resultset= mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($resultset);
		if($row!=null ){
			
			$_SESSION['idempleado']= $row['idempleado'];
			$_SESSION['usuario']= $row['usuario'];
			$_SESSION['contrasena']=$row['contrasena'];
			$_SESSION['idstatus']= $row['idstatus'];
			$_SESSION['activo']= '1';
			
			if($row['idstatus'] == 1){
				
			    if(password_verify($contrasena,$row['contrasena'])){
						header("location: ../menuprincipal/index.php");
					}else{
						echo '<script>alert("Usuario y/o contraseña incorrectos"); window.location = "login.php"; </script> ';
					}

		}else{
			echo '<script>alert("El usuario está inactivo"); window.location = "login.php"; </script> ';
		}
		
}else{
	echo '<script>alert("Usuario y/o contraseña incorrectos"); window.location = "login.php"; </script> ';
}

	}

?>



