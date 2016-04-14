<!DOCTYPE html>
<?php
include_once 'conecta.php';
if (isset($_POST['boton-envia'])) {
  //valores para agregar en base de datos

  $nombre =$_POST['nombrecito'];
  $apellido=$_POST['apellidos'];
  $localidad=$_POST['lugar'];

  //comandos para sql
  $sentencia_sql="INSERT INTO usuarios(nombre,apellido,ciudad)VALUES('$nombre','$apellido','$localidad')";
//insertando la funcion de sql
if (mysqli_query($db_server,$sentencia_sql)) {
  ?>
<script type="text/javascript">
  alert('Se han insertado todos los datos exitosamente');
  windows.location.href='index.php';
</script>
  <?php
}
else {
  ?>
  <script type="text/javascript">
    alert('Un error ha ocurrido mientras se insertaban tus datos');
    windows.location.href='index.php';
  </script>
<?php
}
}
 ?>


<html>
  <head>
    <meta charset="utf-8">
    <title>Agregar datos</title>
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
<div id="cabecera">
    <div id="contenido">
      <label>Sistema para registrar Usuarios</label>
      <label id="subtitulo">Agregando Datos</label>
    </div>
    <form  method="post">
        <table align="center">
          <tr>
              <td align="center">
                <a href="index.php">Regresa al menu Principal</a>
              </td>
              <tr>
                <td>
                  <input type="text" name="nombrecito" placeholder="Pon tu nombre" required="">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="apellidos" placeholder="Pon tus apellidos" required="">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="lugar" placeholder="Lugar" required="">
                </td>
              </tr>
              <tr>
                  <td>
                    <button type="submit" name="boton-envia"><strong>Guarda Datos</strong></button>
                  </td>
              </tr>
          </tr>
        </table>

    </form>

</div>
  </body>
</html>
