<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Proyecto 1 Desarrollo Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body style="text-align: center;">
    <?php require('header_admin.php')?>
    <div class="card text-center" style="margin-top: 15px; padding: 10px; display: inline-block">
      <div class="card-body">
        <h5 class="card-title">Gestión de usuario</h5>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Usuario</th>
              <th scope="col">Activo</th>
              <th scope="col">Fecha de creación</th>
              <th scope="col">Tipo de usuario</th>
              <th scope="col">Op.</th>
            </tr>
          </thead>
          <tbody>
            <?
              require('fx_administrador.php');
              $resultado = obtener_cajero();

              while ($cajero = $resultado?->fetch_assoc()){
                echo "<tr>
                  <td>" . $row['nombre']  . "</td>
                  <td>" . $row['usuario'] . "</td>
                  <td>" . $row['activo'] . "</td>
                  <td>" . $row['fecha_creacion'] . "</td>
                  <td>" . $row['id_tipo_usuario'] . "</td>
                  <td></td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>