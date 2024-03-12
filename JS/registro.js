document.addEventListener("DOMContentLoaded", function () {

    function $(id) { return document.querySelector(id) }
    function registrar() {
        if (confirm("¿Desea registrar este Empleado?")) {
            const key = $("#nom_user").value;
            const password = $("#pass_user").value;
            const encryptedPassword = CryptoJS.AES.encrypt(password, key).toString();
            const parametros = new FormData();
            parametros.append("operacion", "add");
            parametros.append("nombres", $("#nombres").value)
            parametros.append("apellidos", $("#apellidos").value)
            parametros.append("nom_user", $("#nom_user").value)
            parametros.append("pass_user", encryptedPassword)

            fetch("../Controllers/Empleado.controllers.php", {
                method: "POST",
                body: parametros
            })
                .then(respuesta => respuesta.json())
                .then(datos => {
                    document.getElementById("frmEmpleados").reset();
                    alert('El usuario se ha registrado con exito');
                    window.location.href = 'Login.php';
                })
                .catch(e => {
                    console.error(e);
                });
        }
    }
    $("#registrar").addEventListener("click", registrar);
    $("#pass_user").addEventListener("keypress", (event) => {
        if (event.keyCode == 13) {
            registrar()
        }
      });
});