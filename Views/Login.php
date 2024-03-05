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
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      function $(id) { return document.querySelector(id) }
      function decryptPassword(password, key) {
        const bytes = CryptoJS.AES.decrypt(password, key);
        return bytes.toString(CryptoJS.enc.Utf8);
      }
      function logear() {
        const user = $("#username").value

        if (user != "") {
          const parametros = new FormData()
          parametros.append("operacion", "login")
          parametros.append("user", user)
          fetch(`../Controllers/Empleado.controllers.php`, {
            method: "POST",
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos => {
              if (!datos) {
                alert('No se encontro al usuario')
                $("#frmLogin").reset()
                $("#username").focus()
              }
              else {
                const pass = $("#password").value
                const key = $("#username").value
                const passcryp= decryptPassword(datos.pass_user,key)
                if (pass == passcryp) {
                  window.location.href = 'principal.php';
                }
                else{
                  alert('Error en la contraseña')
                }

              }
            })
            .catch(e => {
              console.error(e)
            })
        }

      }
      $("#password").addEventListener("keypress", (event) => {
        if (event.keyCode == 13) {
          logear()
        }
      });

      $("#Comprobar").addEventListener("click", logear)

    })
  </script>
</body>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>