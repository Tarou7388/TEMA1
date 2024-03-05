<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <form action="" id="frmEmpleados">
        <h2>Registro</h2>
        <input type="text" id="nombres" name="nombres" placeholder="Nombre" required>
        <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
        <input type="text" id="nom_user" name="nom_user" placeholder="Nombre de usuario" required>
        <input type="password" id="pass_user" name="pass_user" placeholder="Contraseña" required>
        <button type="button" id="registrar">Entrar</button>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            function $(id) { return document.querySelector(id) }
            function registrar() {
                console.log('hola');
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
                            if (datos.idobtenido > 0) {
                                document.getElementById("frmEmpleados").reset();
                                alert(`Empleado registrado con el ID: ${datos.idobtenido}`);
                            }
                        })
                        .catch(e => {
                            console.error(e);
                        });
                }
            }
            $("#registrar").addEventListener("click", registrar);
        });
    </script>
</body>

</html>