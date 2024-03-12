<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Contraseña</title>
  <link rel="stylesheet" href="../CSS/actualizar.css">
</head>

<body>

  <div class="container">
    <h2>Actualizar Contraseña</h2>
    <form action="" method="post">
      <div class="input-group">
        <label for="new-password">Nueva Contraseña</label>
        <input type="password" id="password" name="new-password" required>
      </div>
      <div class="input-group">
        <label for="confirm-password">Confirmar Nueva Contraseña</label>
        <input type="password" id="confirm-password" name="confirm-password" required>
      </div>
      <button type="button" class="btn" id="enviar">Actualizar Contraseña</button>
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="../JS/actualizarcontraseña.js"></script>
</body>

</html>