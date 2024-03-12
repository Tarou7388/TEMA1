document.addEventListener("DOMContentLoaded", () => {
    let correo = '';
    const parametros2 = new FormData()
    parametros2.append("operacion", "correo")
    fetch(`../Controllers/Empleado.controllers.php`, {
        method: "POST",
        body: parametros2
    })
        .then(respuesta34 => respuesta34.json())
        .then(datos => {
            correo = datos.user
            console.log(correo)
            function $(id) { return document.querySelector(id) }
            function actualizarcontraseña() {
                const pass = $("#password").value
                if (pass != "") {
                    if (pass == $("#confirm-password").value) {
                        const parametros = new FormData()
                        const key = correo;
                        const encryptedPassword = CryptoJS.AES.encrypt(pass, key).toString();
                        console.log(encryptedPassword)
                        parametros.append("operacion", "actualizarcontraseña")
                        parametros.append("user", '')
                        parametros.append("pass", encryptedPassword)
                        fetch(`../Controllers/Empleado.controllers.php`, {
                            method: "POST",
                            body: parametros
                        })
                            .then(respuesta => respuesta.json())
                            .then(datos => {
                                console.log(datos)
                                window.location.href = 'Login.php';
                                alert('La contraseña se actualizo con exito')
                            })
                            .catch(e => {
                                console.error(e)
                            })
                    }
                    else (
                        alert('Las contraseñas no coinciden')
                    )
                }
            }
            $("#confirm-password").addEventListener("keypress", (event) => {
                if (event.keyCode == 13) {
                    actualizarcontraseña()
                }
            });
            $("#enviar").addEventListener("click", actualizarcontraseña)
        })

})