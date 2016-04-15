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
	

	<!-- ************** Agregar ******************** -->
	<?

		if(isset($_POST['botonAgregar'])){

	    $nombre = $_POST['nombre'];
	    $apellido = $_POST['apellido'];
	    $fechaContrato = $_POST['fechaContrato'];
	    $mail = $_POST['email'];
	    $departamento = $_POST['departamento'];
	    $salario = $_POST['salario'];
		
			$agregar = mysqli_query($conexion, "INSERT INTO empleado (nombre, apellido, fechaContrato, email, departamento, salario) VALUES ('".$nombre ."', '". $apellido ."', '". $fechaContrato ."', '". $mail ."', '". $departamento ."', '". $salario ."');");

			function redireccionar($url,$segundos) {
      	if(!$segundos) { $segundos = 0; } // <- Hace que la variable de segundos sea opcional
        echo '<meta http-equiv="refresh" content="'.$segundos.'; url='.$url.'" />';
      }
      redireccionar("index.php",0);
		}
	?>

	<div class="table-responsive">
		<table class="table" style="width: 80%;">
			<tr>
	        <th scope="colgroup" colspan="9">EMPLEADOS</th>
	    </tr>
			<th>NOMOBRE</th>
			<th>APELLIDO</th>
			<th>EMAIL</th>
			<th>DEPARTAMENTO</th>
			<th>FECHA</th>
			<th>SALARIO</th>
			<th>AGREGAR</th>

			<h2>Captura de datos</h2>
			<form class="formulario" action="" method="POST" accept-charset="utf-8">
				<tr>
					<td><input type="text" name="nombre" placeholder="Nombre"  required maxlength="20" onkeypress="javascript:if(event.which==127 && event.which<31 || event.which>33 && event.which<65 || event.which>90 && event.which<97 || event.which>122){return false;}" /></td>
					<td><input type="text" name="apellido" placeholder="Apellido" maxlength="20" onkeypress="javascript:if(event.which==127 && event.which<31 || event.which>33 && event.which<65 || event.which>90 && event.which<97 || event.which>122){return false;}" /></td>
					<td><input type="email" name="email" placeholder="juan@hotmail.com" required /></td>
					<td>
						<select name='departamento'>";
    					<option value='0'>Selecciona</option>";
    					<option value='compras'>Compras</option>";
    					<option value='ventas'>Ventas</option>";
    					<option value='gerente'>Gerente</option>";
    					<option value='sistemas'>Sistemas</option>";
    				</select>
    			</td>		
					<td><input type="date" name="fechaContrato" required/></td>
					<td><input type="text" name="salario" placeholder="$0.00" required/></td>
					<td><input type='submit' value='Agregar' name='botonAgregar'></td>
				</tr>
			</form>


		</table>
	</div>
	<br />
	<br />




	<div class="table-responsive">
			
			<?php
				/* . mysqli_query($conexion, "DELETE FROM empleado WHERE id_empleado ='". $fila['id_empleado'] ."';") .
				* Realizar la consulta a la base de datos. 
				* Darle formato al campo fechaContrato y cambiar el nombre del campo por fecha (dentro de la consulta).
				* Darle formato al campo salarario agragando dos decimales 
				*/
				if(isset($_POST['botonBorrar'])){
					$borrarId = $_POST['borrarId'];
	    		$borrar1 = mysqli_query($conexion, "DELETE FROM empleado WHERE id_empleado ='". $borrarId ."';");
	    	}

	    	if(isset($_POST['botonActualizar'])){
	    		$b = $_POST['borrarId'];
					function redireccionar($url,$segundos,$b) {
		      	if(!$segundos) { $segundos = 0; } // <- Hace que la variable de segundos sea opcional
		        echo '<meta http-equiv="refresh" content="'.$segundos.'; url='.$url ."?actualiza1=". $b.'" />';
		      }
		      redireccionar("actualizar.php",0, $b);
	    	}
	    	
	    	?>
		</table>
		<br/>
		<br/>
		<br/>
	  <table class="table table-striped" style="width: 80%;">
			<tr>
	        <th scope="colgroup" colspan="9">EMPLEADOS</th>
	    </tr>
			<th>ID EMPLEADO</th>
			<th>NOMOBRE</th>
			<th>APELLIDO</th>
			<th>EMAIL</th>
			<th>DEPARTAMENTO</th>
			<th>FECHA</th>
			<th>SALARIO</th>
			<th>BORRAR</th>
			<th>ACTUALIZAR</th>
			
			<?

				$seleccion = mysqli_query($conexion, "SELECT id_empleado, nombre, apellido, DATE_FORMAT(fechaContrato,'%d - %m - %Y') AS fecha, email, departamento, FORMAT(salario, 2) AS salario   FROM empleado;");

			//Recorrer todos los campos solicitados en la consulta para despues imprimirlos en pantalla
				while($fila= mysqli_fetch_array($seleccion)){
					echo '<tr><form action="" method="POST" accept-charset="utf-8">';
					echo '<td><input type="hidden" value="' . $fila['id_empleado'] . '" name="borrarId" >' . $fila['id_empleado'] . '</td>';
					echo "<td>" . $fila['nombre'] ."</td>";
					echo "<td>" . $fila['apellido'] . "</td>";
					echo "<td>" . $fila['email'] . "</td>";
					echo "<td>" . $fila['departamento'] . "</td>";
					echo "<td>" . $fila['fecha'] . "</td>";
					echo "<td>$" . $fila['salario'] . "</td>";
					echo '<td><input type="submit" value="Borrar" name="botonBorrar"></td>';
					echo '<td><input type="submit" value="Actualizar" name="botonActualizar"></td>';
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