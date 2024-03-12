document.addEventListener("DOMContentLoaded", () => {
    function $(id) { return document.querySelector(id) }
    function verificar() {
        const token = $("#token").value
        if (token != "") {
            const parametros = new FormData()
            parametros.append("operacion", "Token_verificar")
            parametros.append("user", '')
            fetch(`../Controllers/Empleado.controllers.php`, {
                method: "POST",
                body: parametros
            })
                .then(respuesta => respuesta.json())
                .then(datos => {
                    console.log(datos)
                    if (datos.token_user == token) {
                        window.location.href = 'Login.php';
                    }
                    else {
                        alert('Error en el token')
                    }
                })
                .catch(e => {
                    console.error(e)
                })
        }
    }
    $("#token").addEventListener("keypress", (event) => {
        if (event.keyCode == 13) {
            verificar()
        }
    });
    $("#Verificar").addEventListener("click", verificar)
})