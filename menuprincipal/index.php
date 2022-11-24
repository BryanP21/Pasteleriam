<?php
include('../php/conexion.php');

session_start();
if(!isset($_SESSION['usuario'])){
	echo '<script> alert("Por favor debes iniciar sesión"); window.location = "../php/login.php"; </script>'; 
	session_destroy();
	
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    
    <?php
        include('../navigation/head.php');
    ?>
</head>
<body>
    <?php 
        include('../navigation/menu.php');
    ?>


    

    <?php
        include('../navigation/footer.php');
    ?>

 
</body>
</html>
