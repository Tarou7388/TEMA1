<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <form id="frmEmpleados">
        <h2>Registro</h2>
        <input type="text" id="nombre" name="nombres" placeholder="Nombre" required>
        <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
        <input type="text" id="username" name="nom_user" placeholder="Nombre de usuario" required>
        <input type="password" id="password" name="pass_user" placeholder="Contraseña" required>
        <input type="submit" value="Registrarse">
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bcryptjs/2.4.3/bcrypt.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function $(id) { return document.querySelector(id) }
            $("#frmEmpleados").addEventListener("submit", (event) => {
                //evitamos el envío por ACTION
                event.preventDefault();

                const password = $("#password").value;
                const saltRounds = 10;

                bcrypt.hash(password, saltRounds, (err, passwordhash) => {
                    if (err) {
                        console.error(err);
                        return;
                    }

                    //Envio por AJAX
                    if (confirm("¿Desea registrar este Empleado?")) {

                        const parametros = new FormData()
                        parametros.append("operacion", "add")
                        parametros.append("nombres", $("#nombres").value)
                        parametros.append("apellidos", $("#apellidos").value)
                        parametros.append("nom_user", $("#nom_user").value)
                        parametros.append("pass_user", passwordhash)

                        fetch(`../Controllers/Empleado.controllers.php`, {
                            method: "POST",
                            body: parametros
                        })
                            .then(respuesta => respuesta.json())
                            .then(datos => {
                                if (datos.idobtenido > 0) {
                                    $("#frmEmpleados").reset
                                    alert(`Empleado registrado con el ID: ${datos.idobtenido}`)
                                }

                            })
                            .catch(e => {
                                console.error(e)
                            })
                    }
                })
            })
        })
    </script>
</body>

</html>