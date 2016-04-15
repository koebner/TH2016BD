<? 
	include_once 'php/con.php';
?> 

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Telmexhub base de datos Mysql </title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	
</head>
<body>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
				<img src="img/telmex.png" alt="Telmex"></a>
      </a>
    </div>
  </div>
</nav>

<section class="content">
	<h1>
	TelmexHub Curso BD <br/>
	</h1>

	<div>
		<table class="table table-striped" style="width: 80%;">
				<tr>
		        <th scope="colgroup" colspan="8">EMPLEADOS</th>
		    </tr>
				<th>NOMOBRE</th>
				<th>APELLIDO</th>
				<th>EMAIL</th>
				<th>DEPARTAMENTO</th>
				<th>FECHA</th>
				<th>SALARIO</th>
				<th>ACTUALIZAR</th>
				<th>CANCELAR</th>
			<?php
				$as=$_GET['actualiza1'];

				if(isset($_POST['bottonActualiza'])){

					$nombreAA = $_POST['nombrea'];
					$apellidoA = $_POST['apellidoa'];
					$emailA = $_POST['emaila'];
					$departamentoA = $_POST['departamentoea'];
					$fechaA = $_POST['fechaa'];
					$salarioA = $_POST['salarioa'];

					$actualizar1a = mysqli_query($conexion, "UPDATE empleado SET nombre='". $nombreAA ."' WHERE id_empleado=".$as.";");

					function redireccionar($url,$segundos) {
		      if(!$segundos) { $segundos = 0; } // <- Hace que la variable de segundos sea opcional
		        echo '<meta http-equiv="refresh" content="'.$segundos.'; url='.$url.'" />';
		      }
		      redireccionar("index.php",0);

		      if(isset($_POST['Cancelar'])){

					function redireccionar($url,$segundos) {
						echo $nombreAA = $_POST['nombrea'];
		      if(!$segundos) { $segundos = 0; } // <- Hace que la variable de segundos sea opcional
		        echo '<meta http-equiv="refresh" content="'.$segundos.'; url='.$url.'" />';
		      }
		      redireccionar("index.php",0);
	    	}
			
				}
				$seleccionActualizar = mysqli_query($conexion, "SELECT nombre, apellido, DATE_FORMAT(fechaContrato,'%d - %m - %Y') AS fecha, email, departamento, salario   FROM empleado WHERE id_empleado='".$as."' ;");
					
				
				//Recorrer todos los campos solicitados en la consulta para despues imprimirlos en pantalla
					while($fila= mysqli_fetch_array($seleccionActualizar)){
						echo '<tr><form action="" method="POST" accept-charset="utf-8">';
						echo '<td><input type="text" name="nombrea" value="' . $fila['nombre'] .'"/></td>';
						echo '<td><input type="text" name="apellidoa" value="' . $fila['apellido'] . '"</td>';
						echo '<td><input type="text" name="emaila" value="' . $fila['email'] . '"</td>';
						echo '<td><input type="text" name="departamentoa" value="' . $fila['departamento'] . '"</td>';
						echo '<td><input type="text" name="fechaa" value="' . $fila['fecha'] . '"</td>';
						echo '<td><input type="text" name="salarioa" value="' . $fila['salario'] . '"</td>';
						echo '<td><input type="submit" value="Actualiza" name="bottonActualiza"></td>';
						echo '<td><a href="index.php"><img src="img/regresar.png" style="width:10%"/></a></td>';
						echo "</tr></form>";
					}
			?>
		</table>
	</div>	
	<br/>
	<br/>
	<br/>
	

</section>

<footer>
	<h4>Derechos Reservados Base de datos</h4>
</footer>
	
</body>
</html>