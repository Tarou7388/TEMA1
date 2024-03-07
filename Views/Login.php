<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/Login.css">
</head>

<body>
  <img src="../Img/Beta_logo.png">
  <div class="login-container">
    <h2>Login</h2>
    <form action="" id="frmLogin">
      <input type="text" id="username" placeholder="Username" required>
      <input type="password" id="password" placeholder="Password" required>
      <button type="button" id="Comprobar">Entrar</button>
      <p style="margin-top: 10px;">¿Nuevo usuario?, <a id="registrar-link" href="registro.php">registrar</a></p>
      <p><a href="recuperar.php">Recuperar contraseña</a></p>
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="../JS/script_login.js"></script>
</body>
</html>