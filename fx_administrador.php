<?
  require('util.php');

  function agregar_cajero($nombre, $usuario, $password) {
    $sql = "call sp_agragar_usuario('$nombre', '$usuario', '$password', 'CAJ')";
    $resultado = ejecutar_sql($sql);
    $_cajero = $resultado->fetch_assoc();

    if ($resultado->num_rows == 0) {
      return;
    }

    return $_cajero;
  }

  function obtener_cajero() {
    $sql = "call sp_obtener_usuario('CAJ');";
    $resultado = ejecutar_sql($sql);
    
    if ($resultado->num_rows == 0) return null;
    else return $resultado;
  }

  function bloquear_cajero($id_usuario) {
    $sql = "call sp_bloquear_usuario($id_usuario);";
    $resultado = ejecutar_sql($sql);

    if($resultado->num_rows == 0) return [];
    else return $resultado;
  }

  function obtener_cantidad_cuentas_creadas() {
    $sql = "call sp_obtener_cantidad_cuentas_creadas();";
    $resultado = ejecutar_sql($slq);

    if ($resultado->num_rows == 0) return [];
    else return $resultado;
  }

  function obtener__cantidad_clientes_registrados() {
    $sql = "call sp_obtener_cantidad_clientes_registrados();";
    $resultado = ejecutar_sql($sql);

    if($resultado->num_rows == 0) return [];
    else return $resultado;
  }

  function obtener_cantidad_transacciones() {
    $sql = "call sp_obtener_cantidad_transacciones();";
    $resultado = ejecutar_sql($sql);

    if($resultado->num_rows == 0) return [];
    else return $resultado;
  }

  function obtener_cantidad_retiros() {
    $sql = "call sp_obtener_cantidad_retiros();";
    $resultado = ejecutar_sql($sql);

    if($resultado->num_rows == 0) return [];
    else return $resultado;
  }

  function obtener_cantidad_depositos() {
    $sql = "call sp_obtener_cantidad_depositos();";
    $resultado = ejecutar_sql($sql);

    if($resultado->num_rows == 0) return [];
    else return $resultado;
  }


  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['accion']) {
      case 'login':
        $autenticacion = autenticar_usuario($_POST['usuario'], $_POST['password']);
        if ($autenticacion) header('Location: http://proyecto-php.atwebpages.com/main_admin.php');
        else header('Location: http://proyecto-php.atwebpages.com/login_admin.php');
        break;
      case 'registrar_cajero':
        agregar_cajero($_POST['nombre'], $_POST['usuario'], $_POST['password']);
        break;
      default:
        break;
    }
  }
?>