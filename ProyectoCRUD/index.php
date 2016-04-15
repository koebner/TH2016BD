<!DOCTYPE html>
<?php
include_once 'conecta.php';//conecto a mi base de datos
//Condicional para borrar en BD
if (isset($_GET['id_borra']))
 {
  $sql_sent = "DELETE FROM usuarios WHERE id_user=".$_GET['id_borra'];//un string para enviar a SQL , borramos datos con un id (sentencia completa)
  mysqli_query($db_server,$sql_sent);//Manda consulta por medio de una variable
 header("location: $_SERVER[PHP_SELF]");
}
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Datos de Telmex2016</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css" >
    <script type="text/javascript">//se crea dos funciuones para enviar datos tanto para borrar como para editar
      function edita_dato(id){
        if (confirm('Estas seguro de hacer un cambio?')) {
          window.location.href='editadato.php?edita_id='+id;
        }
      }
      function borra_dato(id){
        if (confirm('Estas seguro de borrar el dato?')) {
          window.location.href='index.php?id_borra='+id;

        }
      }
    </script>
  </head>
  <body>
    <div id="cabecera">
      <div id="contenido">
        <label>Sistema para registrar Usuarios</label>
      </div>
      <div id="tablita">
        <div id="contenido2">
          <table>
            <tr>
              <th colspan="5"><a href="CrearDato.php">Agrega info</a>
              </th>
            </tr>
            <th>
              Nombre
            </th>
            <th>
              Apellido
            </th>
            <th>
              Ciudad
            </th>
            <th colspan="2">
              Operaciones
            </th>
            <?php
            $sql_sentencia = "SELECT * FROM usuarios";
            $resultado_final =mysqli_query($db_server,$sql_sentencia);
            while ($fila=mysqli_fetch_row($resultado_final)) {
              ?>
              <tr>
                <td>
                  <?php echo "$fila[1]"; ?>
                </td>
                <td>
                  <?php echo "$fila[2]"; ?>
                </td>
                <td>
                  <?php echo "$fila[3]"; ?>
                </td>
                <td align="center">
                  <a href="javascript:edita_dato('<?php echo $fila[0]; ?>')"><img src="https://image.freepik.com/iconos-gratis/pagina-de-edicion_318-33138.jpg"  height="30px" width="30px"/></a>
                </td>
                <td align="center">
                  <a href="javascript:borra_dato('<?php echo $fila[0]; ?>')"><img src="https://image.freepik.com/iconos-gratis/boton-eliminar_318-77600.png"  height="30px" width="30px"/></a>
                </td>
              </tr>
              <?php
            }
               ?>
          </table>
        </div>

      </div>
    </div>

  </body>
</html>
