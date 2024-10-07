<?
  function autenticar_usuario($usuario, $contraseña, $tipo_usario) {
    if (!isset($_SESSION['usuario'])) {
      $sql = "call sp_obtener_usuario('$usuario', '$contraseña', '$tipo_usuario');";
      $resultado = ejecutar_sql($sql);
      $_usuario = $resultado->fetch_assoc();

      if ($resultado->num_rows == 0 ) {
        return false;
      } else {
        $_SESSION['usuario'] = $_usuario;
      }

      return true;
    }
    return true;
  }

  function autenticar_cliente($usuario, $password) {
    if (!isset($_SESSION['cliente'])) {
      $sql = "call sp_obtener_cliente('$usuario', '$password');";

      $resultado = ejecutar_sql($sql);
      $_cliente = $resultado->fetch_assoc();

      if($resultado->num_rows == 0) {
        return false;
      } else {
        $_SESSION['cliente'] = $_cliente;
      }

      return true;
    }

    return true;
  }

  function ejecutar_sql($sql) {
    $conexion = new mysqli('localhost', 'proyecto_1', 'desarrollo', 'desarrollo_web');

    if($conexion->connect_error) {
      die("Conexión fallida: " . $conexion->connect_error);
    }

    $resultado = $conexion->query($sql);
    $conexion->close();
    return $resultado;
  }
?>