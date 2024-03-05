<?php
require_once '../Models/Empleado.php';
if (isset($_POST['operacion'])) {
  $empleado = new Empleado();
  if ($_POST['operacion'] == 'login') {
    $respuesta = $empleado->login(["user" => $_POST['user']]);
    echo json_encode($respuesta);
  }
  if ($_POST['operacion'] == 'add') {
    $datosRecibidos = [
      "nombres" => $_POST["nombres"],
      "apellidos" => $_POST["apellidos"],
      "nom_user" => $_POST["nom_user"],
      "pass_user" => $_POST["pass_user"]
    ];
    $idobtenido = $empleado->add($datosRecibidos);
    echo json_encode($idobtenido);
  }
}