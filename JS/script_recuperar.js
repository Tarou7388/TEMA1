document.addEventListener("DOMContentLoaded", () => {
  function $(id) { return document.querySelector(id) }
  function recuperar() {
    const user = $("#email").value
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
          }
          else {
            const token = Math.floor(Math.random() * 900000) + 100000;
            console.log(token)
            const parametros2 = new FormData()
            parametros2.append("operacion", "tokencrear")
            parametros2.append("gmail", user)
            parametros2.append("token", token)
            fetch(`../Controllers/Empleado.controllers.php`, {
              method: "POST",
              body: parametros2
            }).then(datos => {
                alert('Se ha enviado un codigo de recuperar a tu correo')
                window.location.href = 'verificar.php';
              })
              .catch(e => {
                console.error(e)
              })
          }
        })
        .catch(e => {
          console.error(e)
        })
    }
  }
  $("#email").addEventListener("keypress", (event) => {
    if (event.keyCode == 13) {
      recuperar()
    }
  });
  $("#comprobar").addEventListener("click", recuperar)
})