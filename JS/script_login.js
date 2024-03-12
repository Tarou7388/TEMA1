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