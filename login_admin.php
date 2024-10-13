<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body style="text-align: center;">
    <?php require('header.php')?>
    <div class="card text-center" style="width: 18rem; margin-top: 15px; padding: 10px; display: inline-block;">
      <div class="card-body">
        <h5 class="card-title">Administrador</div>
        <form action="fx_administrador.php" method="post">
          <input type="hidden" name="accion" value="login">
          <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text" class="form-control" name="usuario">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
      </div>
    </div>
  </body>
</html>