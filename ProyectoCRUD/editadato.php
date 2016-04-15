<!DOCTYPE html>
<?php
include_once 'conecta.php';
if(isset($_GET['edita_id'])) {
  $sentencia_sql2="SELECT * FROM usuarios WHERE id_user=".$_GET['edita_id'];
  $resultado_final2=mysqli_query($db_server,$sentencia_sql2);
   $arreglodatos=mysqli_fetch_row($resultado_final2);
}
if (isset($_POST['botonActualizar'])) {
  $nombreupdate=$_POST['nombrecito'];
  $apellidoupdate=$_POST['apellidos'];
  $localidadupdate=$_POST['lugar'];

  $sentenciaUpdate="UPDATE usuarios SET nombre='$nombreupdate',apellido='$apellidoupdate',ciudad='$localidadupdate' WHERE id_user=".$_GET['edita_id'];
  mysqli_query($db_server,$sentenciaUpdate);
}
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Edita datos por medio de php</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css" >

  </head>
  <body>
    <
      <div id="contenido">
        <label id="cabecera2">Edicion de datos</label>
      </div>
      <div id="tablita">
        <form method="post">
           <table align="center">
                    <tr>
                 <td align="center">
                   <a href="index.php">Regresa al menu Principal</a>
                 </td>
                   </tr>
              <tr>
                <td>
                  <input type="text" name="nombrecito" placeholder="nombre" value="<?php  echo $arreglodatos[1]; ?>" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="apellidos" placeholder="tus apellidos" value="<?php  echo $arreglodatos[2]; ?>" required>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="lugar" placeholder="localidad" value="<?php  echo $arreglodatos[3]; ?>" required>
                </td>
              </tr>
              <tr>
                <td>
                  <button type="submit" name="botonActualizar"><strong>Actualiza datos</strong></button>
                </td>
              </tr>
           </table>
        </form>
      </div>

  </body>
</html>
