<?
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$database = "tienda";

	$conexion = mysqli_connect($host, $user, $pass, $database)
		or die("No se puede conectar a la base de datos");
	   $tildes = $conexion->query("SET NAMES 'utf8'");

?>