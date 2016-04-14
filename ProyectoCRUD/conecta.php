<?php
$host = "localhost";//servidor
$user = "root";//usuario de bd
$password = "Dragon123";//contraseña de base de datos
$database = "telmexdb";//nombre de la base de datos
$db_server = mysqli_connect($host,$user, $password);//var para conectar a mysql
if (!$db_server) die("No se pudo conectar al servicio de MariaDB: " . mysql_error());//condicional prueba de fallos
mysqli_select_db($db_server,$database);//parametros para seleccionar base de datos
 ?>
