<?
  require('util.php');

  function agregar_cajero($cajero) {
    $sql = "call sp_agragar_usuario('$cajero->nombre', '$cajero->usuario', '$cajero->password', 'CAJ')";
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
    
    if ($resultado->num_rows == 0) return [];
    else return $resultado;
  }

  function bloquear_cajero($id_usuario) {
    $sql = "call sp_bloquear_usuario($id_usuario);";
    $resultado = ejecutar_sql($sql);

    if($resultado->num_rows == 0) return [];
    else return $resultado;
  }

  function obtener_cantidad_cuentas_creadas() {
    $sql = "call sp_obtener_cuentas_creadas();";
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
?>