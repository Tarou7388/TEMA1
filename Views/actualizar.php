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
      <label for="password">Contraseña Actual</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div class="input-group">
      <label for="new-password">Nueva Contraseña</label>
      <input type="password" id="new-password" name="new-password" required>
    </div>
    <div class="input-group">
      <label for="confirm-password">Confirmar Nueva Contraseña</label>
      <input type="password" id="confirm-password" name="confirm-password" required>
    </div>
    <button type="submit" class="btn">Actualizar Contraseña</button>
  </form>
</div>

</body>
</html>
